<?php

namespace App\Http\Controllers;
use App\Models\Loser;
use App\Models\Betslip;
use PgSql\Lob;
use Illuminate\Http\Request;

class LoserController extends Controller
{


    //store the Loser betslip id
public function store(betslip $betslip){

    $Loser=loser::create([

'betslip_id' => $betslip->id,
            'user_id' => $betslip->user_id,
            'reason' => 'Grind harder next time',  // Example reason, customize as needed


    ]);


    return response()->json([
        'message' => 'Bet lost, loser record created.',
        'betslip' => $betslip
    ]);

}
}
