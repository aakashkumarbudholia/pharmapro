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



//start admin route
// admin login

Route::get('/', 'Front_managerController@index')->middleware('check_after');
Route::get('/interview/{id}', 'Front_managerController@interview')->middleware('check_after');
Route::get('/service', 'Front_managerController@service')->middleware('check_after');
Route::get('/login', 'Front_managerController@login')->middleware('check_after');
Route::post('/login', 'Front_managerController@check_login')->middleware('check_after');
Route::get('/register', 'Front_managerController@register')->middleware('check_after');
Route::post('/register', 'Front_managerController@save_register')->middleware('check_after');

Route::get('/dashboard', 'Front_managerController@dashboard')->middleware('check');
Route::get('/pricing', 'Front_managerController@service');
Route::get('/support', 'Front_managerController@contact');
Route::get('/solution', 'Front_managerController@about');

Route::get('/interview/{id}', 'Front_managerController@interview')->middleware('check');
Route::post('/interview/{id}', 'Front_managerController@interview1')->middleware('check');

Route::post('/interviewee/{id}', 'Front_managerController@interview1');

Route::get('/interviewee/{id}', 'Front_managerController@interview');

Route::get('/logout', 'Front_managerController@logout');

Route::get('/admin', 'Admin_loginController@index')->middleware('check_after');
Route::post('/check_login', 'Admin_loginController@check_login');
Route::get('/dashboard_admin', 'DashboardController@index')->middleware('check');
Route::get('/delete_interview/{id}', 'Front_managerController@delete')->middleware('check');
Route::get('/admin/services', 'admin\ServicesController@index')->middleware('check');
Route::get('/admin/services/add', 'admin\ServicesController@add')->middleware('check');
Route::post('/admin/services/insert', 'admin\ServicesController@insert')->middleware('check');
Route::get('/admin/services/edit/{id}', 'admin\ServicesController@edit')->middleware('check');
Route::post('/admin/services/update', 'admin\ServicesController@update')->middleware('check');
Route::get('/admin/services/delete/{id}', 'admin\ServicesController@delete')->middleware('check');
Route::get('/admin/about', 'admin\AboutUsController@index')->middleware('check');
Route::post('/admin/about/update', 'admin\AboutUsController@update')->middleware('check');
Route::get('/admin/contact', 'admin\ContactUsController@index')->middleware('check');
Route::post('/admin/contact/update', 'admin\ContactUsController@update')->middleware('check');
Route::get('/admin/logout', 'DashboardController@logout');
Route::get('/admin/profile', 'admin\ProfileController@index')->middleware('check');
Route::post('/admin/profile/update', 'admin\ProfileController@update')->middleware('check');

Route::get('/admin/interviewer', 'admin\InterviewerController@index')->middleware('check');
Route::get('/admin/interviewer/add', 'admin\InterviewerController@add')->middleware('check');
Route::post('/admin/interviewer/insert', 'admin\InterviewerController@insert')->middleware('check');
Route::get('/admin/interviewer/edit/{id}', 'admin\InterviewerController@edit')->middleware('check');
Route::post('/admin/interviewer/update', 'admin\InterviewerController@update')->middleware('check');
Route::get('/admin/interviewer/delete/{id}', 'admin\InterviewerController@delete')->middleware('check');

Route::get('/admin/interviewee', 'admin\IntervieweeController@index')->middleware('check');
Route::get('/admin/interviewee/add', 'admin\IntervieweeController@add')->middleware('check');
Route::post('/admin/interviewee/insert', 'admin\IntervieweeController@insert')->middleware('check');
Route::get('/admin/interviewee/edit/{id}', 'admin\IntervieweeController@edit')->middleware('check');
Route::post('/admin/interviewee/update', 'admin\IntervieweeController@update')->middleware('check');
Route::get('/admin/interviewee/delete/{id}', 'admin\IntervieweeController@delete')->middleware('check');

Route::get('/profile/', 'Front_managerController@profile')->middleware('check');
Route::post('/update_profile/', 'Front_managerController@update_profile')->middleware('check');

Route::get('/name_auto_fill', 'Front_managerController@name_auto_fill');
Route::post('/get_auto_comp_values', 'Front_managerController@get_auto_comp_values');

Route::get('/name_auto_fill_interviewee', 'Front_managerController@name_auto_fill_interviewee');
Route::post('/get_auto_comp_values_interviewee', 'Front_managerController@get_auto_comp_values_interviewee');
/*
Route::get('/', 'Admin_loginController@index')->middleware('check_after');
Route::get('/interview/{id}', 'Admin_loginController@interview')->middleware('check_after');
Route::get('/service', 'Admin_loginController@service')->middleware('check_after');
Route::post('/check_logins', 'Admin_loginController@check_logins');
Route::get('/login', 'Admin_loginController@register')->middleware('check_after');;
Route::get('/register', 'Admin_loginController@register')->middleware('check_after');
Route::post('/register', 'Admin_loginController@save_register')->middleware('check_after');
*/

// Route::get('/', 'Admin_loginController@index')->middleware('check_after');


// Route::get('/dashboard', 'DashboardController@index')->middleware('check');
// Route::post('/check_login', 'Admin_loginController@check_login');


