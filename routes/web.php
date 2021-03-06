<?php
if (App::environment('production')) {
    URL::forceScheme('https');
}
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
Route::get('/get_residence','usersController@get_residence')->name('get.residence');
Route::post('/addUser','usersController@store')->name('add.user');
Route::put('/update_user','usersController@update')->name('update');
Route::get('/get_profile','usersController@get_profile')->name('get_profile');
Route::get('/Profile','usersController@profile')->name('profile');
Route::post('/updateDetails','usersController@updateDetails')->name('update.details');

Route::get('/Calls','CallsController@index')->name('calls');
Route::get('/get_calls','CallsController@get_calls')->name('get.calls');
Route::put('/call_update/{id}','CallsController@update')->name('update.calls');
Route::get('/Log-Call','CallsController@log_call')->name('log.call');
Route::get('/get_call_types','CallsController@get_call_types')->name('get.calltypes');
Route::post('/addCall','CallsController@store')->name('add.call');
Route::get('/Calls-Progress','CallsController@CallsProgress')->name('Calls.Progress');
Route::get('/Call-Progress','CallsController@progress')->name('Call.Progress');
Route::get('/tests','CallsController@progress')->name('Call.Progress');

Route::get('/Meetings','MeetingController@index')->name('meetings');
Route::get('/Ward-Coucilor-Meetings','MeetingController@ward_meetings')->name('ward.meetings');
Route::get('/get_ward_meeting','MeetingController@get_ward_meeting')->name('ward.get_meetings');
Route::get('/Accepted-Meeting','MeetingController@acceptedmeeting')->name('accepted.meeting');
Route::get('/get_meetings','MeetingController@get_meetings')->name('get.meetings');
Route::put('/meeting_update/{id}','MeetingController@update')->name('meeting.update');
Route::get('/get_meeting_type','MeetingController@get_meeting_type')->name('get.meeting_type');
Route::get('/wardCouncil','MeetingController@wardCouncil')->name('wardCouncil');
Route::post('/createMeeting','MeetingController@store')->name('create.meeting');

Route::get('/Suggestions','SuggestionController@index')->name('suggestions');
Route::get('/get_com_sug','SuggestionController@get_suggestions')->name('get.com_sug');
Route::get('/Project-Suggestions','SuggestionController@project_suggestion')->name('Project.Suggestions');
Route::post('/addsuggession','SuggestionController@store')->name('addsuggession');


Route::get('/Apply','PlansController@index')->name('apply');
Route::get('/get_plan_types','PlansController@get_plan_types')->name('get.plan_types');
Route::post('/add_apply','PlansController@store')->name('add.apply');
Route::post('/saveFile','PlansController@saveFile')->name('saveFile');
Route::get('/get_application','PlansController@get_application')->name('get.application');
Route::get('/Application-Management','PlansController@application_management')->name('application.management');
Route::put('/application_update/{id}','PlansController@update')->name('applation.update');
Route::get('/Application-Progress','PlansController@application_progress')->name('applation.progress');
Route::get('/View-Application/{id}','PlansController@view_application')->name('view.applation');

Route::get('/get_plan_and_doc/{id}','PlansController@get_plan_and_doc')->name('get.plandoc');
Route::get('/prepare_file/{file}','PlansController@prepare_file')->name('prepare.file');

Route::get('/Projects','ProjectsController@index')->name('projects');
Route::get('/get_projects','ProjectsController@get_projects')->name('get.projects');
Route::post('/add_project','ProjectsController@store')->name('add.project');
Route::put('/update_project/{id}','ProjectsController@update')->name('update.project');

Route::get('/Budgets','BudgetsController@index')->name('budget');
Route::post('/add_budget','BudgetsController@store')->name('add.budget');
Route::get('/get_budgets','BudgetsController@get_budgets')->name('get.budgets');
Route::put('/update_budget','BudgetsController@update')->name('update.budget');

Route::get('/Bookings','BookingController@index')->name('bookings');
Route::post('/add_booking','BookingController@store')->name('add.booking');
Route::put('/update_booking/{id}','BookingController@update')->name('update.booking');
Route::get('/get_booking_types','BookingController@get_booking_types')->name('get.book_types');
Route::get('/get_bookings','BookingController@get_bookings')->name('get.bookings');
Route::get('/Booking-Management','BookingController@booking_management')->name('booking.management');

Route::get('/Bill','BillsController@index')->name('bills');
Route::get('/get_bills','BillsController@get_bills')->name('get.bills');
Route::post('/bill_upload','BillsController@store')->name('bill.upload');
Route::get('/MyBills','BillsController@mybills')->name('mybills');
Route::get('/get_user_bills','BillsController@user_bills')->name('user.bills');
Route::get('/get_mybill/{id}','BillsController@get_mybill')->name('get.mybill');
Route::get('/Manage-Payments','BillsController@accept_bill_payemnt')->name('manage.payments');
Route::get('/get_res_bills','BillsController@get_res_bills')->name('get.res.bills');
Route::get('/bill-received/{id}','BillsController@bill_received')->name('bill.received');
Route::get('/Bill-History','BillsController@bill_history')->name('bill.history');

Auth::routes();

Route::get('/Dashboard', 'HomeController@index')->name('Dashboard');
Route::get('/callStats', 'StatsController@callStats')->name('callStats');
Route::get('/projectsStats', 'StatsController@projectsStats')->name('projectsStats');
Route::get('/budgetStats', 'StatsController@budgetStats')->name('budgetStats');
Route::get('/test',function (){

    return view('test');

});