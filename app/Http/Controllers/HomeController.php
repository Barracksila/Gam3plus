<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @method \Illuminate\Routing\Controller middleware(string|array $middleware, array $options = [])
 */

class HomeController extends Controller
{
   public function index()
{
    $user = Auth::user();
    return view('home', compact('user'));
}
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
