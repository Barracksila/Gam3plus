<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Example API route
Route::middleware('api')->get('/example', function (Request $request) {
    return response()->json(['message' => 'Hello, world!']);
});




Route::get('/hello', function () {
    return response()->json(['message' => 'Hello from Laravel']);
});
