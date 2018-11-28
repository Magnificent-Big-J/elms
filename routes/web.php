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
    return view('management.users');
});
Route::get('/Dashboard', function () {
    return view('management.dashboard');
});
Route::get('/Profile', function () {
    return view('management.profile');
});
Route::get('/Meetings', function () {
    return view('management.Meetings');
});
Route::get('/Calls', function () {
    return view('management.calls');
});
Route::get('/Projects', function () {
    return view('management.project');
});
Route::get('/Budgets', function () {
    return view('management.budgets');
});
Route::get('/Bills', function () {
    return view('management.bills');
});
Route::get('/Apply', function () {
    return view('residence.apply');
});
Route::get('/MyBills', function () {
    return view('residence.mybills');
});
Route::get('/Suggestions', function () {
    return view('residence.Suggestions');
});
Route::get('/Bookings', function () {
    return view('residence.bookings');
});
Route::get('/Log-Call', function () {
    return view('residence.logcall');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
