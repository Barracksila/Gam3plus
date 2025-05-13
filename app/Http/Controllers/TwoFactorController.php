<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.twofactor');
    }

    public function store(Request $request)
    {
        $request->validate(['two_factor_code' => 'required']);

        $user = User::where('two_factor_code', $request->two_factor_code)
            ->where('two_factor_expires_at', '>', now())
            ->first();

        if (!$user) {
            return redirect()->back()->withErrors(['two_factor_code' => 'The code is invalid or expired.']);
        }

        $user->resetTwoFactorCode();

      /** @var \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard $auth */
$auth = auth();
$auth->login($user);

        //auth()->login($user);


        return redirect()->intended('/Home');
        // Redirect to intended page
    }
}
