<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //create an admin Controller


public function register(request $request){


//register new Admin

    $request->validate([


        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',

    ]);
//create a single Admin
$Admin= Admin::create([
'name'=>$request->name,
'email'=>$request->email,
'Password'=>Hash::make($request->password),

]);

//Authenticate Admin after registration
Auth::Login($Admin);

return response()->json([

'message'=>'Registration is susccesful',
'Admin'=>$Admin,

]);
}

//Login Admin

public function Login(request $request){

    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);


if (Auth::attempt(['name'=>$request->name, 'email'=>$request->email,
'Password'=>$request->password]));
response()->json([

'error'=>'Invalid credentials'
],401);
}



//Logout the authenticated Admin

public function Logout(){






    Auth::logout();





    return response()->json();
}
}
