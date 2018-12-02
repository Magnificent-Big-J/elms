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

Route::redirect('/', '/Dashboard');

Route::get('/users','usersController@index')->name('users');
Route::get('/get_users','usersController@get_users')->name('get.users');
Route::post('/addUser','usersController@store')->name('add.user');
Route::put('/update_user','usersController@update')->name('update');
Route::get('/get_profile','usersController@get_profile')->name('get_profile');
Route::get('/Profile','usersController@profile')->name('profile');

Route::get('/Calls','CallsController@index')->name('calls');
Route::get('/get_calls','CallsController@get_calls')->name('get.calls');
Route::put('/call_update/{id}','CallsController@update')->name('update.calls');
Route::get('/Log-Call','CallsController@log_call')->name('log.call');
Route::get('/get_call_types','CallsController@get_call_types')->name('get.calltypes');
Route::post('/addCall','CallsController@store')->name('add.call');

Route::get('/Meetings','MeetingController@index')->name('meetings');
Route::get('/get_meetings','MeetingController@get_meetings')->name('get.meetings');
Route::put('/meeting_update/{id}','MeetingController@update')->name('meeting.update');
Route::get('/get_meeting_type','MeetingController@get_meeting_type')->name('get.meeting_type');
Route::post('/createMeeting','MeetingController@store')->name('create.meeting');

Route::get('/Suggestions','SuggestionController@index')->name('suggestions');
Route::post('/addsuggession','SuggestionController@store')->name('addsuggession');


Route::get('/Apply','PlansController@index')->name('apply');
Route::get('/get_plan_types','PlansController@get_plan_types')->name('get.plan_types');
Route::post('/add_apply','PlansController@store')->name('add.apply');
Route::get('/get_application','PlansController@get_application')->name('get.application');
Route::get('/Application-Management','PlansController@application_management')->name('application.management');
Route::put('/application_update/{id}','PlansController@update')->name('applation.update');

Route::get('/Projects','ProjectsController@index')->name('projects');
Route::get('/get_projects','ProjectsController@get_projects')->name('get.projects');
Route::post('/add_project','ProjectsController@store')->name('add.project');
Route::put('/update_project/{id}','ProjectsController@update')->name('update.project');

Route::get('/Budgets','BudgetsController@index')->name('budget');
Route::post('/add_budget','BudgetsController@store')->name('add.budget');
Route::get('/get_budgets','BudgetsController@get_budgets')->name('get.budgets');

Route::get('/Bookings','BookingController@index')->name('bookings');
Route::post('/add_booking','BookingController@store')->name('add.booking');
Route::put('/update_booking/{id}','BookingController@update')->name('update.booking');
Route::get('/get_booking_types','BookingController@get_booking_types')->name('get.book_types');
Route::get('/get_bookings','BookingController@get_bookings')->name('get.bookings');
Route::get('/Booking-Management','BookingController@booking_management')->name('booking.management');

Route::get('/Bill','BillsController@index')->name('bills');
Route::get('/MyBills','BillsController@mybills')->name('mybills');
Route::get('/get_user_bills','BillsController@user_bills')->name('user.bills');

Auth::routes();

Route::get('/Dashboard', 'HomeController@index')->name('Dashboard');
Route::get('/callStats', 'StatsController@callStats')->name('callStats');
Route::get('/projectsStats', 'StatsController@projectsStats')->name('projectsStats');
Route::get('/projectsStats', 'StatsController@projectsStats')->name('projectsStats');
Route::get('/projectsStats', 'StatsController@projectsStats')->name('projectsStats');
Route::get('/budgetStats', 'StatsController@budgetStats')->name('budgetStats');
