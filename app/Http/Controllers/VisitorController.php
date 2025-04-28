<?php

namespace App\Http\Controllers;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //create a visitor

    public function Visitor(){


$Visitor=visitor::all();


        return response()->json(
$Visitor
        );
    }


//we can register  a new user which is the visitor
public function register(request $Request){


$Visitor=visitor::create([


'name'=>$Request->name,
'Country'=>$Request->Counry,
'email'=>$Request->email,
'Avatar'=>$Request->Avatar,

]);

return response()->json(
    [
        'Visitors',201
    ]
);

}

//we can store teh Visitor details


public function Store(request $Request, $Visitor_id){

$Request->validate([

'name'=>'required',
'email'=>'rewquired',
'Avatar'=>'required',
'Country'=>'Required',

]);
//store an individual Visitor and their details
$Visitor=visitor::findorfail($Visitor_id);

//the visitor csan also  not be authenticated depending on  a number of attributes












    return response()->json([



    $Visitor
    ]);



    }

}
