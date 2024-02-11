<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth', 'verified'], function () {
    Route::get('/', function () {
        return view('home');
    });
});

Route::view('profile/edit', 'profile.edit')->name('profile.edit')->middleware('auth');
Route::view('profile/password','profile.password')->name('profile.password')->middleware('auth'); 
