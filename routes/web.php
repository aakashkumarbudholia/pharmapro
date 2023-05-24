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

Route::get('test', 'TestController@test');

Route::get('local/{id}', 'Front_managerController@local');

//Route::get('/', 'Front_managerController@index')->middleware('check_after');

Route::get('/payment/{id}', 'Front_managerController@payment_index');
Route::post('/payment/{id}', 'Front_managerController@payment_stripe');
Route::get('/success/{id}/{iid}/{checkout_id}', 'Front_managerController@payment_success');
Route::post('/update_invoice_address/{id}', 'Front_managerController@update_invoice_address');
Route::get('/purchase_history', 'Front_managerController@purchase_history');
Route::get('/export_pdf/{id}/{user_id}/{iid}', 'Front_managerController@export_pdf');

Route::get('/fr', 'Front_managerController@index');
Route::get('/en', 'Front_managerController@index');

Route::get('/all-job', 'Front_managerController@all_job');
Route::get('/toutes-les-offres', 'Front_managerController@all_job');

Route::get('/jobs', 'Front_managerController@all_job_xml');
Route::get('/jobs1', 'Front_managerController@all_job_xml1');

Route::get('/', 'Front_managerController@index');
Route::get('/interview/{id}', 'Front_managerController@interview')->middleware('check_after');

Route::get('/mydata', 'Front_managerController@mydata');

Route::get('/interview_reactive/{id}', 'Front_managerController@interview_reactive');
Route::post('/interview_reactive/{id}', 'Front_managerController@interview_reactive1');


Route::get('/service', 'Front_managerController@service')->middleware('check_after');
Route::get('/login', 'Front_managerController@login')->middleware('check_after');
Route::post('/login', 'Front_managerController@check_login')->middleware('check_after');
Route::get('/creer-profil-employeur', 'Front_managerController@register')->middleware('check_after');
Route::post('/creer-profil-employeur', 'Front_managerController@save_register')->middleware('check_after');
Route::get('add-to-log', 'HomeController@myTestAddToLog');
Route::get('logActivity', 'HomeController@logActivity');
Route::get('Log','HomeController@index');
Route::get('/forgotpassword', 'Front_managerController@forgotpassword');
Route::post('/forgotpassword', 'Front_managerController@check_forgotpassword');

Route::get('/changepassword/{id}', 'Front_managerController@changepassword');
Route::post('/changepassword', 'Front_managerController@check_changepassword');

Route::get('/changepassword_team_member/{id}', 'Front_managerController@changepassword_team_member');
Route::post('/changepassword_team_member', 'Front_managerController@check_changepassword_team_member');

/*Add Date:-04/05/2022*/
Route::get('/pharmpro_teamhub','Team_hubController@index')->middleware('check');
Route::post('/pharmpro_teamhub/insert','Team_hubController@insert')->middleware('check');
Route::post('CheckEmailAddress','Team_hubController@CheckEmailAddress');
Route::post('/pharmpro_teamhub/edit/{id}','Team_hubController@edit');
Route::get('/pharmpro_teamhub/delete/{id}','Team_hubController@delete');
Route::get('/Teamhubuser_profile','Front_managerController@pharmapro_teamhubprofile');
Route::post('/update_teamhubprofile','Front_managerController@update_teamhubprofile');
Route::get('/setPassword/{id}','Team_hubController@setpassword');
Route::post('/sendPassword/{id}','Team_hubController@sendPassword');
Route::get('/ThankYou','Team_hubController@thankyou');
Route::get('/AlredyActiveted','Team_hubController@alredyactiveted');
/*Add Date:- 10/05/2022*/
Route::get('/admin/TeamHubUser','admin\PhrmTeamHubController@index')->middleware('check');
Route::get('/admin/TeamHubUser/add','admin\PhrmTeamHubController@add')->middleware('check');
Route::post('/admin/TeamHubUser/insert','admin\PhrmTeamHubController@insert')->middleware('check');
Route::get('/admin/TeamHubUser/edit/{id}','admin\PhrmTeamHubController@edit')->middleware('check');
Route::post('/admin/TeamHubUser/update','admin\PhrmTeamHubController@update')->middleware('check');
Route::get('/admin/TeamHubUser/delete/{id}','admin\PhrmTeamHubController@delete')->middleware('check');


Route::get('/deletereactivateimage/{id}','Front_managerController@deletereactivateimage')->middleware('check');
Route::get('/publier-offre','Front_managerController@pharmpro_fr');

Route::get('/dashboard', 'Front_managerController@dashboard')->middleware('check');
Route::get('/pricing', 'Front_managerController@service');
Route::get('/service', 'Front_managerController@service');
Route::get('/support', 'Front_managerController@contact');
Route::get('/solution', 'Front_managerController@about');
Route::get('/about', 'Front_managerController@about');
Route::get('/cg', 'Front_managerController@cg');
Route::get('/cg-dutilisation', 'Front_managerController@cg_dutilisation');
Route::get('/confirmation-inscription-nl','Front_managerController@confirmation_inscription_nl');
Route::post('/job_filter_process', 'Front_managerController@job_filter_department');

Route::get('/search-jobs-records', 'Front_managerController@search_jobs_records')->middleware('check');

Route::get('/interview_arch/{id}', 'Front_managerController@interview_arch')->middleware('check');
Route::get('/acheter_premium/{id}', 'Front_managerController@acheter_premium')->middleware('check');

Route::get('/interview/{id}', 'Front_managerController@interview')->middleware('check');
Route::post('/interview/{id}', 'Front_managerController@interview1')->middleware('check');

Route::post('/interview1_arch/{id}', 'Front_managerController@interview1_arch')->middleware('check');

Route::post('/interviewee/{id}', 'Front_managerController@interview1');  

Route::post('/interviewee/{id}', 'Front_managerController@interview1'); 

Route::get('/pdfdelete/{id}', 'Front_managerController@pdfdelete')->middleware('check');

Route::get('/desc-img-delete/{id}', 'Front_managerController@descImgDelete')->middleware('check');



Route::get('/interviewee/{id}', 'Front_managerController@interview');

Route::get('/publication-formulaire-offre-emploi', 'Front_managerController@interviewform');
Route::post('/publication-formulaire-offre-emploi', 'Front_managerController@interviewform1');

/*
Route::get('/publication-formulaire-offre-emploi-paid', 'Front_managerController@interviewformpaid');
Route::post('/publication-formulaire-offre-emploi-paid', 'Front_managerController@interviewformpaid1');

Route::get('/admin/publication-formulaire-offre-emploi-paid/edit/{id}', 'admin\JobPostController@edit_paid');
Route::post('/admin/publication-formulaire-offre-emploi-paid/update', 'admin\JobPostController@update_jobs_paid');
*/


Route::get('/formulaire', 'Front_managerController@interviewformpaid');
Route::post('/formulaire', 'Front_managerController@interviewformpaid1');
Route::get('/joblist','JoblistController@index1');
Route::get('/joblist1','JoblistController@index');
//Route::resource('formulaire', 'FormulaireController');

Route::get('/admin/formulaire/edit/{id}', 'admin\JobPostController@edit_paid');
Route::post('/admin/formulaire/update', 'admin\JobPostController@update_jobs_paid');






Route::get('/admin/publication-formulaire-offre-emploi/edit/{id}', 'admin\JobPostController@edit');
Route::post('/admin/publication-formulaire-offre-emploi/update', 'admin\JobPostController@update_jobs');


Route::get('/admin/publication-formulaire-offre-emploi/edit_reactive/{id}', 'admin\JobPostController@edit_reactive');
Route::post('/admin/publication-formulaire-offre-emploi/update_reactive', 'admin\JobPostController@update_jobs_reactive');


Route::get('/logout', 'Front_managerController@logout');

Route::get('/admin', 'Admin_loginController@index')->middleware('check_after');
Route::post('/check_login', 'Admin_loginController@check_login');
Route::get('/dashboard_admin', 'DashboardController@index')->middleware('check');
Route::get('/dashboard_ajax', 'DashboardController@dashboard_ajax')->middleware('check');
Route::get('/dashboard_search_ajax', 'DashboardController@dashboard_search_ajax')->middleware('check');
Route::get('/delete_interview/{id}', 'Front_managerController@delete')->middleware('check');

Route::get('/delete_profile/{id}', 'Front_managerController@delete_profile');

Route::get('/reactive_interview/{id}', 'Front_managerController@reactive')->middleware('check');
Route::get('/admin/services', 'admin\ServicesController@index')->middleware('check');
Route::get('/admin/services/add', 'admin\ServicesController@add')->middleware('check');
Route::post('/admin/services/insert', 'admin\ServicesController@insert')->middleware('check');
Route::get('/admin/services/edit/{id}', 'admin\ServicesController@edit')->middleware('check');
Route::post('/admin/services/update', 'admin\ServicesController@update')->middleware('check');
Route::get('/admin/services/delete/{id}', 'admin\ServicesController@delete')->middleware('check');

Route::get('/admin/stag', 'admin\SeoController@index')->middleware('check');
Route::get('/admin/stag/add', 'admin\SeoController@add')->middleware('check');
Route::post('/admin/stag/insert', 'admin\SeoController@insert')->middleware('check');
Route::get('/admin/stag/edit/{id}', 'admin\SeoController@edit')->middleware('check');
Route::post('/admin/stag/update', 'admin\SeoController@update')->middleware('check');
Route::get('/admin/stag/delete/{id}', 'admin\SeoController@delete')->middleware('check');




Route::get('/admin/about', 'admin\AboutUsController@index')->middleware('check');
Route::post('/admin/about/update', 'admin\AboutUsController@update')->middleware('check');
Route::get('/admin/contact', 'admin\ContactUsController@index')->middleware('check');
Route::post('/admin/contact/update', 'admin\ContactUsController@update')->middleware('check');
Route::get('/admin/logout', 'DashboardController@logout');
Route::get('/admin/profile', 'admin\ProfileController@index')->middleware('check');
Route::post('/admin/profile/update', 'admin\ProfileController@update')->middleware('check');

Route::get('/admin/employer', 'admin\InterviewerController@index')->middleware('check');
Route::get('/admin/employer/add', 'admin\InterviewerController@add')->middleware('check');
Route::post('/admin/employer/insert', 'admin\InterviewerController@insert')->middleware('check');
Route::get('/admin/employer/edit/{id}', 'admin\InterviewerController@edit')->middleware('check');
Route::post('/admin/employer/update', 'admin\InterviewerController@update')->middleware('check');
Route::get('/admin/employer/delete/{id}', 'admin\InterviewerController@delete')->middleware('check');

Route::get('/admin/interviewee', 'admin\IntervieweeController@index')->middleware('check');
Route::get('/admin/interviewee/add', 'admin\IntervieweeController@add')->middleware('check');
Route::post('/admin/interviewee/insert', 'admin\IntervieweeController@insert')->middleware('check');
Route::get('/admin/interviewee/edit/{id}', 'admin\IntervieweeController@edit')->middleware('check');
Route::post('/admin/interviewee/update', 'admin\IntervieweeController@update')->middleware('check');
Route::get('/admin/interviewee/delete/{id}', 'admin\IntervieweeController@delete')->middleware('check');

Route::get('/profile/', 'Front_managerController@profile')->middleware('check');
Route::post('/update_profile/', 'Front_managerController@update_profile')->middleware('check');

Route::get('/profile_entreprise/{id}', 'Front_managerController@profile_entreprise')->middleware('check');
Route::post('/update_profile_entreprise/', 'Front_managerController@update_profile_entreprise')->middleware('check');

Route::get('/name_auto_fill', 'Front_managerController@name_auto_fill');
Route::post('/get_auto_comp_values', 'Front_managerController@get_auto_comp_values');

Route::get('/name_auto_fill_interviewee', 'Front_managerController@name_auto_fill_interviewee');
Route::post('/get_auto_comp_values_interviewee', 'Front_managerController@get_auto_comp_values_interviewee');
Route::get('/remove_question/{iid}/{id?}', 'Front_managerController@remove_question');
Route::get('/prix', 'Front_managerController@prix');
Route::get('/faq-employeur', 'Front_managerController@faq_employeur');
Route::get('/questions-frequentes-employeur', 'Front_managerController@faq_employeur');
Route::get('/faq-candidat', 'Front_managerController@faq_candidat');
Route::get('/qui-sommes-nous', 'Front_managerController@qui_sommes_nous');
Route::get('/impressum', 'Front_managerController@impressum');
Route::get('/contact', 'Front_managerController@contact');
Route::post('/contact', 'Front_managerController@getcontact');
Route::get('/protection-des-donnees', 'Front_managerController@protection_des_donnees');
Route::get('/politique-de-confidentialite', 'Front_managerController@protection_des_donnees');

Route::get('/{id}', 'Front_managerController@job_detail');
Route::get('/job_detail/{id}/{iid}/', 'Front_managerController@job_detail_process');
Route::get('/offre-emploi/{id}/{iid}/', 'Front_managerController@job_detail_process');

Route::get('/showstats/{id}/', 'Front_managerController@showstats');

Route::post('/userstats/', 'Front_managerController@userstats');
Route::post('/checkstatesbetween/', 'Front_managerController@checkstatesbetween');

Route::get('/apply-job/{id}', 'Front_managerController@apply_job');
Route::post('/apply', 'Front_managerController@apply');
Route::get('/applied-job/{iid}', 'Front_managerController@applied_job');

Route::get('/admin/all-job', 'admin\JobPostController@index');
Route::get('/admin/job/view/{id}', 'admin\JobPostController@view');
Route::get('/admin/view-applied-job/{iid}', 'admin\JobPostController@applied_job');
Route::get('/admin/lang/{id}', 'admin\LanguageController@index');
Route::post('/admin/update_lang', 'admin\LanguageController@update');
Route::get('/admin/job/delete/{id}', 'admin\JobPostController@delete_jobs')->middleware('check');
	Route::get('/admin/job/reactive/{id}', 'admin\JobPostController@reactive_jobs')->middleware('check');
Route::get('/admin/job/deletepost/{id}', 'admin\JobPostController@delete_jobs_posted')->middleware('check');
Route::get('/admin/job/status/{id}/{iid}', 'admin\JobPostController@status_jobs')->middleware('check');
Route::get('/admin/job/reactivepost/{id}', 'admin\JobPostController@reactive_jobs_posted')->middleware('check');
Route::get('/admin/job/statuspost/{id}/{iid}', 'admin\JobPostController@status_jobs_posted')->middleware('check');

Route::get('/admin/job/deleteadmin/{id}', 'admin\JobPostController@delete_jobs_admin')->middleware('check');
Route::get('/admin/job/deletepostadmin/{id}', 'admin\JobPostController@delete_jobs_posted_admin')->middleware('check');

Route::get('/admin/cg', 'admin\CGController@index')->middleware('check');
Route::get('/admin/cg/edit/{id}', 'admin\CGController@edit')->middleware('check');
Route::post('/admin/cg/update', 'admin\CGController@update')->middleware('check');


Route::get('/admin/notification', 'admin\Notifications@index')->middleware('check');
Route::get('/admin/notification/edit/{id}', 'admin\Notifications@edit')->middleware('check');
Route::post('/admin/notification/update', 'admin\Notifications@update')->middleware('check');
Route::get('/admin/notification/delete/{id}', 'admin\Notifications@delete')->middleware('check');
Route::get('/admin/notification/add', 'admin\Notifications@add')->middleware('check');
Route::post('/admin/notification/insert', 'admin\Notifications@insert')->middleware('check');
Route::get('/admin/notification/status/{id}/{iid}', 'admin\Notifications@status')->middleware('check');


Route::get('/admin/profession', 'admin\ProfessionController@index')->middleware('check');
Route::get('/admin/profession/add', 'admin\ProfessionController@add')->middleware('check');
Route::post('/admin/profession/insert', 'admin\ProfessionController@insert')->middleware('check');
Route::get('/admin/profession/edit/{id}', 'admin\ProfessionController@edit')->middleware('check');
Route::post('/admin/profession/update', 'admin\ProfessionController@update')->middleware('check');
Route::get('/admin/profession/delete/{id}', 'admin\ProfessionController@delete')->middleware('check');

Route::post('/job-filter', 'Front_managerController@job_filter');
Route::post('/job-filter-regions', 'Front_managerController@job_filter_regions');
Route::post('/job-filter-contrat', 'Front_managerController@job_filter_contrat');
Route::post('/show-cont-filter', 'Front_managerController@show_cont_filter');

Route::post('/job_filter_box_swiss', 'Front_managerController@job_filter_box_swiss');
Route::post('/job_filter_box_bel', 'Front_managerController@job_filter_box_bel');

Route::post('/job-region-box', 'Front_managerController@job_filter_box');
Route::post('/job-cont-box', 'Front_managerController@job_cont_box');


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


