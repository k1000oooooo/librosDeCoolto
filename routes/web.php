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
    return view('homeLC');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/partial/Header', function () {
    return view('/partial/Header');
});
Route::get('/partial/Footer', function () {
    return view('/partial/Footer');
});
Route::get('/faqs', function () {
    return view('faqs');
});
