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


Route::get('/users','usersController@index')->name('users');
Route::get('/get_users','usersController@get_users')->name('get.users');
Route::post('//addUser','usersController@store')->name('add.user');

Route::get('/Calls','CallsController@index')->name('calls');
Route::get('/get_calls','CallsController@get_calls')->name('get.calls');
Route::put('/call_update/{id}','CallsController@update')->name('update.calls');


Route::get('/Meetings','MeetingController@index')->name('meetings');
Route::get('/get_meetings','MeetingController@get_meetings')->name('get.meetings');
Route::put('/meeting_update/{id}','MeetingController@update')->name('meeting.update');
//Route::get('','')->name();
/*
Route::get('/Meetings', function () {
    return view('management.Meetings');
});
*/
Route::get('/test', function () {
    return view('test');
});
Route::get('/Dashboard', function () {
    return view('management.dashboard');
});
Route::get('/Profile', function () {
    return view('management.profile');
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
Route::get('/Booking-Management', function () {
    return view('management.book');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
