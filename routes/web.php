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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/kamar', 'KamarController@index');

Route::group(['prefix'=>'backend','middleware'=>'auth'],function(){
    Route::resource('kamar', 'KamarController');
    Route::resource('typekamar', 'TypeKamarController');
    Route::resource('pelanggan', 'PelangganController');
    Route::resource('booking', 'BookingController');
    Route::resource('kunci', 'KunciController');
});