<?php

namespace App\Http\Controllers;

use App\Models\Betslip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Register a new user.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
    //create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Authenticate user after registration
        Auth::login($user);

        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
        ]);
    }

    /**
     * Login a user.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'message' => 'Login successful',
                'user' => Auth::user(),
            ]);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    /**
     * Get the authenticated user's betslips.
     */
    public function getBetslips()
    {
        $user = Auth::user();

        // Retrieve betslips for the authenticated user
        $betslips = $user->betslips;

        return response()->json([
            'betslips' => $betslips,
        ]);
    }

    /**
     * Get the details of a specific betslip for the authenticated user.
     */
    public function getBetslip($id)
    {
        $user = Auth::user();
        $betslip = Betslip::where('user_id', $user->id)->findOrFail($id);

        return response()->json([
            'betslip' => $betslip,
        ]);
    }

    /**
     * Logout the authenticated user.
     */
    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
