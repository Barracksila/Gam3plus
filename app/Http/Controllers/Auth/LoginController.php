<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCode;
use Illuminate\Support\Facades\Log;
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
     $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $user->generateTwoFactorCode(); // generate and send 2FA code here

        return redirect()->route('2fa.form'); // your actual 2FA form route name
    } else {
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
   $user->generateTwoFactorCode();

    return redirect('2fa.index')->route();

}

}

