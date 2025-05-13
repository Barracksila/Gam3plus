<?php

use Illuminate\Support\Facades\Route;
Route::get('/Welcome', function () {
    return view('welcome');
});

// routes/web.php

use App\Http\Controllers\Auth\RegisterController;

Route::post('register', [RegisterController::class, 'register']);
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');

use App\Http\Controllers\Auth\LoginController;
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('Login');
Route::post('login', [LoginController::class, 'login']);
Route::post('/Logout', [App\Http\Controllers\Auth\LoginController::class, 'Logout'])->name('Logout');


Route::get('/Home', function () {
    return view('Home');
})->name('Home')->middleware('auth');


use App\Http\Controllers\CryptoController;

Route::get('/crypto', [CryptoController::class, 'Crypto']);


use App\Http\Controllers\TwoFactorController;

Route::get('/2fa', [TwoFactorController::class, 'index'])->name('2fa.index');
Route::post('/2fa/store', [TwoFactorController::class, 'store'])->name('2fa.store');




 /*use App\Http\Controllers\UserController;
use App\Http\Controllers\BetslipController;
use App\Http\Controllers\LoserController;
use App\Http\Controllers\WinnerController;
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('betslips', [UserController::class, 'getBetslips']);
    Route::get('betslips/{id}', [UserController::class, 'getBetslip']);
    Route::post('/create-betslip', [BetslipController::class, 'create']);


    Betslip routes
    Route::resource('betslips', BetslipController::class)->only([
        'store', 'index', 'show', 'destroy'
    ]);
});

 Additional routes for winner/loser could be accessed, but usually, these are handled internally
in the BetslipController based on the outcome of the bet.
use App\Http\Controllers\RewardController;
use Illuminate\Routing\Router;

Route::prefix('rewards')->group(function () {
    Route::get('/', [RewardController::class, 'index']); // Get all rewards
    Route::post('/', [RewardController::class, 'store']); // Create a new reward
 Route::post('{reward}/claim', [RewardController::class, 'claim']); // Claim a reward
});
routes/web.php

*/


