<?php

namespace App\Http\Controllers;
use App\Models\Winner;
use Illuminate\Http\Request;
use App\Models\Betslip;
class WinnerController extends Controller
{
    //store the winner controller


public function  store(betslip $betslip){

    $Winner=Winner::create([





        'betslip_id' => $betslip->id,
                    'user_id' => $betslip->user_id,
                    'reason' => 'You won congratulations',  // Example reason, customize as needed

            



            ]);
            #

            return response()->json([
                'message' => 'Bet won , Winner record created.',
                'betslip' => $betslip
            ]);











}
}
