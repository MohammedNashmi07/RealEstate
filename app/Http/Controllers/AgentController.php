<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Property;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function agentDashboard(){

        $user = Auth::user();
        // $customer_count = Customer::count();
        $sold_properties_count = Property::where('is_sold', 'yes')->where('agent_id', $user->id)->count();
        $properties = Property::where('status','approved')
        ->where('agent_id', $user->id)
        ->orderBy('id','desc')->take(5)->get();

        return view('agent.dashboard', compact('user','sold_properties_count','properties'));
    }
    // frontend agent show
    public function agentShow($id)
    {
        $agent = User::find($id);
        $properties = Property::where('agent_id', $agent->id)->paginate(3);
        return view('agent.show', compact('agent', 'properties'));
    }

    public function frontAllAgents(){

        $agents = User::where('role', 'agent')->where('status','active')->paginate(6);
        return view('agent.all_agents', compact('agents'));
    }

    public function agentLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function agentProfile(){
        $user = Auth::user();
        return view('agent.agent_profile', compact('user'));
    }

    public function agentChangePassword(){
        $user = Auth::user();
        return view('agent.change_password', compact('user'));
    }

    public function agentPasswordUpdate(Request $request)
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

    public function agentUpdate(Request $request)
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
                    $delete_path = public_path($user_photo);
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
                'message' =>'Agent Profile Updated Successfully'
            ];
            return redirect()->route('agent.profile')->with('message', $message);
        }
        catch(Exception $e){
            return redirect()->route('agent.profile')->with('message', ['success' => 0, 'message'=>'Something Went Wrong']);
        }
    }
}
