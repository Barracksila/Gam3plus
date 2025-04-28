<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    //In thee login Controller we Validate and post the  request

    public function showLoginForm()
    {
        return view('auth\passwords.Login');

    }

public function Login(Request $request)
{
    // Validate the incoming request data
    $credentials = $request->only('email', 'password');

    // Attempt to log in the user
    if (Auth::attempt($credentials)) {
        // Redirect or return success
        return redirect()->intended('/Home');
    } else {
        // Handle failed login
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
public function Logout(Request $request){
//Log out the user

    Auth::Logout();

//

$request->session()->invalidate();

// Regenerate CSRF token to prevent session fixation attacks
$request->session()->regenerateToken();

// Redirect the user to the login page
return redirect()->route('Login')->with('message', 'You have logged out successfully!');
}
public function authenticated(Request $request, $user){


$user->generateTwoFactorCode();





    return redirect('/2fa');//redirect to the verification page
}
}


