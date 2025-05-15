<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class TwoFactorController extends Controller
{
    // Show the 2FA form
    public function showForm()
    {
        return view('auth.twofactor');
    }

    // Verify the entered 2FA code
   public function verify(Request $request)
{
    $request->validate([
        'two_factor_code' => 'required|numeric|digits:6',
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    if ($user->isTwoFactorCodeValid($request->two_factor_code)) {
        $user->resetTwoFactorCode();
        Auth::login($user);
        return redirect()->intended();
    }

    return back()->withErrors(['two_factor_code' => 'Invalid or expired code. Please try again.']);
}

}
