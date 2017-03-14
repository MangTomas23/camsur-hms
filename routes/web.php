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
    return redirect('/login');
});

Auth::routes();
Route::get('main', 'MainController@index');
Route::resource('hospital', 'HospitalController');
Route::group(['prefix' => 'hospital/{id}'], function() {
  Route::group(['prefix' => 'patients'], function() {
    Route::get('/', 'HospitalController@patients');
    Route::get('search', 'HospitalController@searchPatient');
  });
  Route::get('inventory', 'HospitalController@inventory');
  Route::get('payments', 'HospitalController@payments');
  Route::get('doctors', 'HospitalController@doctors');
  Route::get('nurses', 'HospitalController@nurses');
});
Route::get('patient/search', 'PatientController@search');
Route::resource('patient', 'PatientController');
Route::group(['prefix' => 'change/password'], function() {
  Route::get('/', 'Auth\ChangePasswordController@index');
  Route::post('/', 'Auth\ChangePasswordController@updatePassword');
});
Route::get('home', 'HomeController@index');
Route::group(['prefix' => 'database'], function() {
  Route::get('/', 'DatabaseController@index');
});
Route::resource('supplier', 'SupplierController');
Route::resource('bulletin', 'BulletinController');
Route::post('bulletin/attachment/upload', 'BulletinAttachmentController@upload');
