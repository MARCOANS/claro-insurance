<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
use App\Models\Country;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});


Route::get('/home', function () {

    if (auth()->user()->role_id == 1) {
        return redirect('users');
    }

    return redirect()->route('profile');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::middleware(['admin'])->group(function () {

        Route::get('users/get-all', [UserController::class, 'getUsers']);

        Route::resource('users', UserController::class)->only('index', 'store');
    });


    Route::get('profile', [UserController::class, 'profile'])->name('profile');

    Route::get('verify-duplicated-email', [UserController::class, 'verifyDuplicatedEmail']);
});

Route::get('/states-by-country', [CountryController::class, 'getStates']);
Route::get('/cities-by-state', [StateController::class, 'getCities']);
