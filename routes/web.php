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

//Route::group(['middleware' => 'auth',Auth::check()], function () {

Route::get('/', function () {
    return view('index');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//user routes
Route::get('/allusers', 'UserController@index');
Route::get('/donor_details','DonorDetailsController@index');
Route::get('/user_profile/{donor_id}','UserController@profile');
Route::get('/user_index','BloodBankController@user_index');

//Appointments Routes
Route::get('/appointments','AppointmentController@create');
Route::post('/store','AppointmentController@store');
Route::get('/listappointments','AppointmentController@index');
Route::get('/markasread/{appointment_id}','AppointmentController@markasread');
Route::get('/reply/{appointment_id}','AppointmentController@reply');

//complete registration routes
Route::POST('/complete_registration','DonorDetailsController@store');

//centers list
Route::get('/center_list','DonationCentreController@index')->name('centers');
Route::get('/newcenter','DonationCentreController@create'); 
Route::post('/storecenter', 'DonationCentreController@store');

//bloodbank routes
Route::get('bank_details/{center_id}','BloodBankController@index');

//add county and sub county
Route::get('/add_county','CountiesController@create');
Route::post('/store_county','CountiesController@store');
Route::get('/add_sub_county','SubCountiesController@create');
Route::post('/store_sub_county','SubCountiesController@store');

//new admin route
Route::get('/new_admin', 'UserController@new_admin');
Route::POST('/reg_admin', 'UserController@storenewadmin');

//blood drive request route
Route::POST('/blood_drive','BloodBankController@blood_drive');
Route::get('/drive_view','BloodBankController@view_drive');
Route::get('/blood_transfer_view/{center_id}','BloodBankController@transferview');
Route::POST('/post_transfer','BloodBankController@request_transfer');

Route::get('/donation_record', 'DonorDetailsController@returndonationdetails');
Route::POST('/post_donation_record', 'DonorRecordsController@donation_records');
Route::get('/chech_records', 'DonorDetailsController@chech_records');

/** center admins operational routes here*/

//checking a list of all donors within that center
Route::get('/center_donor_list', 'UserController@center_donors');

/**Getting the blood levels of a particular center */
Route::get('/center_blood_level', 'BloodBankController@center_blood_level');



//});