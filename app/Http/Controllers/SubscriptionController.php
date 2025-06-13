<?php

namespace App\Http\Controllers;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){


return view('Subscription');

    }

    public function store(request $request){

        $request->validate([

'email'=>'required string '

        ]);

        Subscription::create([
            'email' => $request->email,
        ]);
 return redirect()->back()->with('success', 'Thanks for subscribing!');



}
}
