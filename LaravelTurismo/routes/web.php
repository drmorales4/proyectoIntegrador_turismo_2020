<?php

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


Route::view('/', 'home')->name('home');
Route::view('hotels', 'hotels')->name('hotels');
Route::view('visualizations', 'visualizations')->name('visualizations');
Route::view('tourism', 'tourism')->name('tourism');
Route::view('login', 'login')->name('login');


/*
Route::get('/', function () {
    return view('welcome');
});
*/