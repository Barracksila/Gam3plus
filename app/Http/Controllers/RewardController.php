<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reward;
class RewardController extends Controller
{

//create a list of all possible Rewards
public function index(){

$Rewards =Reward::all();
    return response()->json($Rewards);

   //create Rewards for the Players

$Reward=Reward::create([



'reward_name'=>$request->reward_name ,
'reward_type'=>$request->reward_type,
'points_required'=> $request->points_required,
]);


    return response()->json('reward', 201);
}
public function store(request $request){


$request->validate([

'reward_name'=>'required',
'reward_type'=>'required',
'Amount'=>'required',


]);

    return response()->json(

    'Reward stored successfully ',

    );
}

public function claim(request $Request, $id){



//Asuumig the authenticated  user model has points
$user=auth();//->user

$Reward=reward::findorfail();

if($user->points<$user->points_required){

    return response()->json([

        'message'=>'Not enough points to claim  this reward'
]    );



//deduct the points that are there

$user->points -=$user->points_required;
$user->save();


//Logically  to mark reward that are claimed

    return response()->json([


        'message'=>'The rewards are stored succesfully',
    'reward'=>$reward,


    ]);
}

}
}
