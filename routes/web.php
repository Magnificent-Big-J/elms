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
Route::get('/users', function () {
    return view('users');
});
Route::get('/Dashboard', function () {
    return view('dashboard');
});
Route::get('/Profile', function () {
    return view('profile');
});
Route::get('/Meetings', function () {
    return view('Meetings');
});
Route::get('/Calls', function () {
    return view('calls');
});
Route::get('/Projects', function () {
    return view('project');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
