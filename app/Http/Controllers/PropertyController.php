<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // frontend property
    public function frontAllProperties()
    {
        $properties = Property::where('is_sold','no')->where('status', 'approved')->paginate(6);
        return view('front_all_property', compact('properties'));
    }

    public function showProperty($id){

        $property = Property::find($id);
        $property_images = PropertyImage::where('property_id', $property->id)->get();
        $agent = User::find($property->agent_id);
        return view('property.show', compact('property', 'property_images', 'agent'));
    }


     public function index(){
        $user = Auth::user();

        if($user->role == 'admin')
        {

            $properties = Property::orderBy('created_at','desc')->paginate(5);
        }
        else{
            $properties = Property::where('agent_id', $user->id)->orderBy('created_at','desc')->paginate(5);
        }
        return view('property.index', compact('user', 'properties'));
    }

    public function markAsSold($id){
        try
        {
            $property = Property::find($id);
            $property->is_sold = 'yes';
            $property->save();
            return response()->json(['success' => true, 'text' => 'Property is Sold..!']);
        }
        catch(Exception $e){
            dd($e);
            return response()->json(['success' => false, 'text' => 'Something went wrong..!']);
        }
    }
    public function markAsRevert($id){
        try
        {
            $property = Property::find($id);
            $property->is_sold = 'no';
            $property->save();
            return response()->json(['success' => true, 'text' => 'Property is Reverted..!']);
        }
        catch(Exception $e){
            dd($e);
            return response()->json(['success' => false, 'text' => 'Something went wrong..!']);
        }
    }

    public function create(){
        $user = Auth::user();
        if($user->role == 'admin')
        {
            $agents = User::where('role', 'agent')->where('status','active')->get();
        }
        else{

            $agents = User::where('role', 'agent')
            ->where('status','active')
            ->where('id',$user->id)
            ->get();

        }
        $customers = Customer::all();
        return view('property.create', compact('user','agents','customers'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $property = Property::find($id);
        $property_images = PropertyImage::where('property_id',$property->id)->orderBy('image_url','desc')->get();

        if($user->role == 'admin')
        {
            $agents = User::where('role', 'agent')->where('status','active')->get();
        }
        else{

            $agents = User::where('role', 'agent')
            ->where('status','active')
            ->where('id',$user->id)
            ->get();

        }
        $customers = Customer::all();
        return view('property.edit', compact('user','property','property_images','agents','customers'));
    }

    public function update(Request $request, $id)
    {
        try
        {
            // update property
            $user = Auth::user();
            $status = 'pending';
            if($user->role == 'admin')
            {
                $status = 'approved';
            }
            $property = Property::find($id);
            DB::beginTransaction();
            $property->title = $request->title;
            $property->description = $request->description;
            $property->no = $request->no;
            $property->street = $request->street;
            $property->city = $request->city;
            $property->country = $request->country;
            $property->property_type= 'House & Apartments';
            $property->price = $request->price;
            $property->currency_type = $request->currency_type;
            $property->size = $request->size;
            $property->measuring_unit = $request->measuring_unit;
            $property->status = $status;
            $property->agent_id = $request->agent_id;
            $property->customer_id = $request->customer_id;
            $property->save();

            // update image links

            if($request->hasFile('photo')){

                $old_images = PropertyImage::where('property_id',$property->id)->get();
                if($old_images)
                {
                    foreach($old_images as $old_image){
                        $old_image_url = $old_image->image_url;
                        unlink($old_image_url);
                        $old_image->delete();
                    }
                }
                $images = $request->file('photo');

                foreach($images as $image){
                    $image_extension = time() . '_' . uniqid() . '.' . $image->extension();
                    $image->move(public_path('upload/property_images'),$image_extension);
                    $image_path = 'upload/property_images/'.$image_extension;

                    PropertyImage::create([
                        'property_id' => $property->id,
                        'image_url' => $image_path
                    ]);

                }
            }
            DB::commit();
            $message = [
                'success' => 1,
                'message' =>'Property Updated Successfully'
            ];

            return redirect()->route('properties.index')->with('message', $message);

        }

        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('properties.edit')->with('message', ['success' => 0, 'message'=>'Something Went Wrong']);
        }
    }



    public function store(Request $request){
        try
        {
            // create the property
            $user = Auth::user();
            $status = 'pending';
            if($user->role == 'admin')
            {
                $status = 'approved';
            }
            DB::beginTransaction();
            $property = Property::create([
                'title' =>$request->title,
                'description' =>$request->description,
                'no' =>$request->no,
                'street' =>$request->street,
                'city' =>$request->city,
                'country' =>$request->country,
                'property_type'=>'House & Apartments',
                'price' =>$request->price,
                'currency_type' =>$request->currency_type,
                'size' =>$request->size,
                'measuring_unit' =>$request->measuring_unit,
                'status' =>$status,
                'agent_id' =>$request->agent_id,
                'customer_id' =>$request->customer_id,
            ]);

            if($request->hasFile('photo')){
                $images = $request->file('photo');

                foreach($images as $image){
                    $image_extension = time() . '_' . uniqid() . '.' . $image->extension();
                    $image->move(public_path('upload/property_images'),$image_extension);
                    $image_path = 'upload/property_images/'.$image_extension;

                    PropertyImage::create([
                        'property_id' => $property->id,
                        'image_url' => $image_path
                    ]);

                }
            }
            DB::commit();
            $message = [
                'success' => 1,
                'message' =>'Property Created Successfully'
            ];

            return redirect()->route('properties.index')->with('message', $message);
        }
        catch(Exception $e){
            // dd($e);
            return redirect()->route('properties.create')->with('message', ['success' => 0, 'message'=>'Something Went Wrong']);
        }
    }

    public function destroy(string $id)
    {
        try
        {
            $property = Property::find($id);
            $property_images = PropertyImage::where('property_id', $property->id)->get();
            foreach($property_images as $property_image)
            {
                unlink($property_image->image_url);
                $property_image->delete();
            }
            $property->delete();
            $message = [
                'success' => 1,
                'text' =>'Property Deleted Successfully'
            ];
        }
        catch(Exception $e){
            $message = [
                'success' => 0,
                'text' =>'Something Went Wrong'
            ];
        }
        return $message;
    }

}
