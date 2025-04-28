<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

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
        //auth()->login($user);

        return redirect()->intended(); // Redirect to intended page
    }
}

