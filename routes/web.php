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
    return view('index');
});

Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    
});


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
Route::get('/newcenter','DonationCentreController@create'); 
Route::post('storecenter', 'DonationCentreController@store');

//bloodbank routes
Route::get('bank_details/{center_id}','BloodBankController@index');

//add county and sub county
Route::get('/add_county','CountiesController@create');
Route::post('/store_county','CountiesController@store');