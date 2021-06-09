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

Route::get('/', 'App\Http\Controllers\IndexController@show');
Route::get('/home/{mode}', 'App\Http\Controllers\IndexController@show')->name('index');

Route::post('/switchMode', 'App\Http\Controllers\IndexController@switchMode');

Route::get('/filters/{mode}', 'App\Http\Controllers\IndexController@showFilters');

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
Route::get('/transactions/{mode}', 'App\Http\Controllers\TransactionController@transactions')->name('transactions')->middleware('auth');
Route::get('/offer','App\Http\Controllers\TransactionController@offer')->middleware('auth');
Route::get('/offer/gerief', 'App\Http\Controllers\TransactionController@offerThing')->middleware('auth');
Route::get('/offer/dienst', 'App\Http\Controllers\TransactionController@offerService')->middleware('auth');
Route::get('/offer/zoekertje', 'App\Http\Controllers\TransactionController@offerAdvert')->middleware('auth');

Route::post('/offer/gerief', 'App\Http\Controllers\TransactionController@createThing')->middleware('auth');
Route::post('/offer/dienst', 'App\Http\Controllers\TransactionController@createService')->middleware('auth');
Route::post('/offer/zoekertje', 'App\Http\Controllers\TransactionController@createAdvert')->middleware('auth');

Route::post('/contacteer', 'App\Http\Controllers\TransactionController@createTransaction')->middleware('auth');

Route::post('/transactions/{mode}', 'App\Http\Controllers\TransactionController@switchMode')->middleware('auth');

Route::get('/gerief/{id}', 'App\Http\Controllers\TransactionController@detailsThing')->middleware('auth');

Route::get('/chat/{transaction}','App\Http\Controllers\ChatController@show')->name('chat')->middleware('auth');
Route::post('/chat/{transaction}','App\Http\Controllers\ChatController@sendMessage')->middleware('auth');