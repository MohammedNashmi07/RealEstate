<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function create(){
        $user = Auth::user();
        return view('user.create', compact('user'));
    }

    public function edit(){

    }

    public function store(Request $request)
    {
        try
        {
            if($request->hasFile('photo'))
            {

                $image_extension = time().".".$request->photo->extension();
                $request->photo->move(public_path('upload/admin_images'),$image_extension);
                $image_path = 'upload/admin_images/'.$image_extension;
            }

            $user = User::create([
                'name' =>$request->name,
                'user_name' =>$request->username,
                'email' =>$request->email,
                'password' =>Hash::make($request->password),

            ]);

        }
        catch(Exception $e)
        {

        }
    }
}
