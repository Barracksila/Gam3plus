<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\TwoFactorCodeCode;
class LoginController extends Controller
{
    //In thee login Controller we Validate and post the  request

    public function showLoginForm()
    {
        return view('auth\passwords.login');

    }

public function login(Request $request)
{
    // Validate the incoming request data
    $credentials = $request->only('email', 'password');

    // Attempt to log in the user
    if (Auth::attempt($credentials)) {
        // Redirect or return success
        return redirect()->intended('/2fa');
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
return redirect()->route('login')->with('message', 'You have logged out successfully!');
}


public function authenticated(Request $request, $user)
{
    $code = rand(100000, 999999); // or use a more secure code generator
    $user->notify(new TwoFactorCode($code));

    // Optionally, store code in session or DB to verify later
    session(['login_code' => $code]);

    return redirect()->route('2fa.index');

}

}


