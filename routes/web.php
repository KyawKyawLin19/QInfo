<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/getData/{id}','HomeController@getData');
Route::get('/getTownships/{id}','HomeController@getTownships');

Route::resource('patient','PatientController');
Route::get('/getPatients/{id}','PatientController@getPatients');
Route::get('/getAllLists','PatientController@getAllLists');
Route::post('/search','PatientController@searchPatient');
Route::post('/searchAll','PatientController@searchAllPatients');

Route::resource('volunteer','VolunteerController');
Route::get('/getVolunteers/{id}','VolunteerController@getVolunteers');
Route::get('/getAllVolunteers','VolunteerController@getAllLists');
Route::post('/searchVolunteer','VolunteerController@searchVolunteer');
Route::post('/searchAllVolunteers','VolunteerController@searchAllVolunteers');
