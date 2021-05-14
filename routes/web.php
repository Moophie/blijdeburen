<?php

use App\Models\Thing;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
    $data['things'] = Thing::all();
    $i = 0;
    foreach($data['things'] as $thing){
        $user = User::find(Auth::user()->id);
        $data['things'][$i]['distance'] = $user->distanceFromUser($thing->geolat, $thing->geolng);
        $i++;
    }

    return view('index', $data);
});

// Authentication
Route::get('/signup', 'App\Http\Controllers\UserController@signup');
Route::post('/signup', 'App\Http\Controllers\UserController@handleSignup');
Route::get('/signin', 'App\Http\Controllers\UserController@signin')->name('login');
Route::post('/signin', 'App\Http\Controllers\UserController@handleSignin');
Route::get('/logout', 'App\Http\Controllers\UserController@handleLogout');

// Profile
Route::get('/profile', 'App\Http\Controllers\UserController@profile')->middleware('auth');
Route::post('/profile', 'App\Http\Controllers\UserController@updateLocation')->middleware('auth');

// Transactions
Route::get('/transactions', 'App\Http\Controllers\TransactionController@transactions')->middleware('auth');
Route::get('/offer','App\Http\Controllers\TransactionController@offer')->middleware('auth');
Route::get('/offer/gerief', 'App\Http\Controllers\TransactionController@offerThing')->middleware('auth');
Route::get('/offer/dienst', 'App\Http\Controllers\TransactionController@offerService')->middleware('auth');
Route::get('/offer/zoekertje', 'App\Http\Controllers\TransactionController@offerAdvert')->middleware('auth');