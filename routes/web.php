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
    return view('appointment');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//user routes
Route::get('/allusers', 'UserController@index');
Route::get('/donor_details','DonorDetailsController@index');
Route::get('/user_profile/{donor_id}','UserController@profile');

//Appointments Routes
Route::get('/appointments','AppointmentController@create');
Route::post('/store','AppointmentController@store');

//complete registration routes
Route::POST('/complete_registration','DonorDetailsController@store');

//centers list
Route::get('/center_list','DonationCentreController@index')->name('centers');

//bloodbank routes
Route::get('bank_details/{center_id}','BloodBankController@index');