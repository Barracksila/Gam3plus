<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;



//Route::get('/api/players', function () {
   // return response()->json([
        //[
            //'Player_id' => 1,
           // 'Player_Name' => 'Alice',
           // 'Country' => 'Kenya',
           // 'Avatar' => 'https://example.com/avatar1.png',
            //'email' => 'alice@example.com',
          //  'Phone_Number' => '0712345678'
        //],
        //[
           // 'Player_id' => 2,
            //'Player_Name' => 'Bob',
            //'Country' => 'Nigeria',
            //'Avatar' => 'https://example.com/avatar2.png',
           // 'email' => 'bob@example.com',
        //    'Phone_Number' => '0801234567'
     // /  ]
  ///  ]);
//});


Route::get('/hello', function () {
    return response()->json(['message' => 'Hello from Laravel']);
});

Route::prefix('api')->group(function () {
    Route::get('/players', [PlayerController::class, 'index']);
    Route::get('/players/{id}', [PlayerController::class, 'show']);
    Route::post('/players', [PlayerController::class, 'store']);
    Route::put('/players/{id}', [PlayerController::class, 'update']);
    Route::delete('/players/{id}', [PlayerController::class, 'destroy']);
});
