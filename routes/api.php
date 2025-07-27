<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

// Example API routes
Route::get('/example', function () {
    return response()->json(['message' => 'Hello, world!']);
});

Route::get('/hello', function () {
    return response()->json(['message' => 'Hello from Laravel']);
});

// Player routes
Route::get('/players', [PlayerController::class, 'index']);         // Get all players
Route::get('/players/{id}', [PlayerController::class, 'show']);     // Get player by ID
Route::post('/players/enroll', [PlayerController::class, 'enroll']); // Add player
Route::put('/players/{id}', [PlayerController::class, 'change']);   // Update player
Route::delete('/players/{id}', [PlayerController::class, 'destroy']); // Delete player
