<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use App\Models\Property;
use DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function welcome(){
        $slider_properties = Property::where('status', 'approved')
                ->where('is_sold','no')
                ->inRandomOrder()
                ->take(3)
                ->get();
        $latest_properties = Property::where('status', 'approved')
                    ->orderBy('created_at', 'desc')
                    ->where('is_sold','no')
                    ->take(3)
                    ->get();
        $agents = User::where('role','agent')
                    ->where('photo','!=', NULL)
                    ->inRandomOrder()
                    ->take(3)
                    ->get();
        return view('landing', compact('slider_properties','latest_properties','agents'));
    }

    public function contact(){

        return view('contact');
    }

    public function about(){

        return view('about');
    }

    public function contactSave(Request $request)
    {
        try
        {
            $input = $request->except('_token');

               Contact::create($input);
               return response()->json(['success' => true, 'text' => 'Password Successfully Updated..!']);

        }

        catch(Exception $e){
            // dd($e);
            return response()->json(['success' => false, 'text' => 'Something went wrong..!']);
        }

    }

    public function index(){
        $user = Auth::user();
        $active_users = User::where('status','active')

        ->orderBy('id','desc')
        ->paginate(5);
        return view('user.index', compact('user', 'active_users'));
    }

    public function create(){
        $user = Auth::user();
        return view('user.create', compact('user'));
    }

    public function edit($id){
        $user = Auth::user();
        $active_user = User::find($id);
        return view('user.edit', compact('user', 'active_user'));
    }

    public function store(Request $request)
    {
        try
        {

            if($request->hasFile('photo'))
            {

                $image_extension = time().".".$request->photo->extension();
                $request->photo->move(public_path('upload/user_images'),$image_extension);
                $image_path = 'upload/user_images/'.$image_extension;
            }
            else{
                $image_path = '';
            }

            if($request->email)
            {
                $user_email = User::where('email',$request->email)->first();
                if($user_email)
                {
                    return redirect()->route('users.create')->with('message', ['success' => 0, 'message'=>'Email Already Exist']);
                }
            }


            $user = User::create([
                'name' =>$request->name,
                'user_name' =>$request->user_name,
                'email' =>$request->email,
                'password' =>Hash::make($request->password),
                'photo' =>$image_path,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'role' =>$request->role,
                'status' =>$request->status,

            ]);

            $message = [
                'success' => 1,
                'message' =>'User Created Successfully'
            ];

            return redirect()->route('users.index')->with('message', $message);

        }
        catch(Exception $e)
        {
            return redirect()->route('users.create')->with('message', ['success' => 0, 'message'=>'Something Went Wrong']);
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $user = User::find($id);

            $image_path = $user->photo;
                if($request->hasFile('photo'))
                {
                    $user_photo = $user->photo;
                    if($user_photo)
                    {
                        unlink($user_photo);
                    }
                    $image_extension = time().".".$request->photo->extension();
                    $request->photo->move(public_path('upload/admin_images'),$image_extension);
                    $image_path = 'upload/admin_images/'.$image_extension;
                }
            DB::beginTransaction();
            $user->user_name = $request->user_name ?? $user->user_name;
            $user->name = $request->name ?? $user->name;
            $user->email = $request->email ?? $user->email;
            $user->password = $request->password ? Hash::make($request->password):$user->password;
            $user->photo = $image_path;
            $user->phone = $request->phone ?? $user->phone;
            $user->address = $request->address ?? $user->address;
            $user->role = $request->role ?? $user->role;
            $user->status = $request->status ?? $user->status;
            $user->save();
            DB::commit();
            $message = [
                'success' => 1,
                'message' =>'User Updated Successfully'
            ];

            return redirect()->route('users.index')->with('message', $message);
        }

        catch(Exception $e){
            DB::rollBack();
            return redirect()->route('users.edit')->with('message', ['success' => 0, 'message'=>'Something Went Wrong']);
        }
    }

    public function destroy(string $id)
    {
        try
        {
            $user = User::find($id);
            // agents cannot deleted if there are properties
            if($user->role == 'agent')
            {
                // find available properties in the name of agent
                $properties = Property::where('agent_id', $user->id)->get();
                // dd($properties);
                if($properties->count() > 0){
                    $message = [
                        'success' => 0,
                        'text' =>'This Agent Has Properties Cannot Delete'
                    ];

                    return $message;
                }
            }
            $user_photo = $user->photo;
                if($user_photo)
                {
                    unlink($user_photo);
                }
            $user->delete();
            $message = [
                'success' => 1,
                'text' =>'User Deleted Successfully'
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
