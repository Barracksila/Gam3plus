<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
class PlayerController extends Controller
{
    ///create a Player instance for all players





    public function Index(){


$Player=player::all();


        return view('Player.index');
    }

public function enroll(request $Request,$PLayer){

    $Request->Validate([

'Player_name'=>'Required',
'Player_id'=>'Required',
'Country'=>'Required',
'Phone_Number'=>'Required',


    ]);

}

//you can read the players profiles

public function Read($Player_id){
$Player=Player::findorfail($Player_id);


    return view('Player_id');
}



public function Change(request  $Request, $Player_id){
$Player=player::findorfail($Player_id);


$Request->Validate([


'Player_name'=>'Required',
'Player_id'=>'Required',
'Country'=>'Required',
'Phone_Number'=>'Required',

]);


    return response('Player.view');
}

//Quit or delete ewach player participating in the games


public function destroy($id)
{
    $player = Player::find($id);

    if (!$player) {
        return response()->json(['message' => 'Player not found.'], 404);
    }

    // Soft delete the player
    $player->delete();

    return response()->json(['message' => 'Player deleted successfully.']);
}

}
