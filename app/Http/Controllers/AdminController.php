<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Property;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function adminDashboard(){
        $user = Auth::user();
        $customer_count = Customer::count();
        $sold_properties_count = Property::where('is_sold', 'yes')->count();
        $properties = Property::where('status','approved')->orderBy('id','desc')->take(5)->get();
        return view('admin.dashboard', compact('user','customer_count','sold_properties_count','properties'));
    }

    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminLogin(){
        return view('admin.admin_login');
    }

    public function adminProfile(){
        $user = Auth::user();
        return view('admin.admin_profile', compact('user'));
    }

    public function adminChangePassword(){
        $user = Auth::user();
        return view('admin.change_password', compact('user'));
    }

    public function adminPasswordUpdate(Request $request)
    {
        try
        {
            $user = User::find($request->user_id);
            if(Hash::check($request->old_pwd, $user->password))
            {
               $user->password = Hash::make($request->new_pwd);
               $user->save();
               return response()->json(['success' => true, 'text' => 'Password Successfully Updated..!']);
            }
            else{
                return response()->json(['success' => false, 'text' => 'Password Does Not Match..!']);
            }
        }

        catch(Exception $e){
            // dd($e);
            return response()->json(['success' => false, 'text' => 'Something went wrong..!']);
        }
    }

    public function adminUpdate(Request $request)
    {
        try
        {
            // save the user details
            $user = User::find($request->user_id);
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

            $user->user_name = $request->user_name;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->photo = $image_path;
            $user->save();

            $message = [
                'success' => 1,
                'message' =>'Admin Profile Updated Successfully'
            ];
            return redirect()->route('admin.profile')->with('message', $message);
        }
        catch(Exception $e){
            return redirect()->route('admin.profile')->with('message', ['success' => 0, 'message'=>'Something Went Wrong']);
        }
    }
}
