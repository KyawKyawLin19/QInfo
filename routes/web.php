<?php

use Illuminate\Support\Facades\Route;
use Routes\Volunteer\VolunteerRoute;
use Routes\Patient\PatientRoute;
use Routes\Home\HomeRoute;


Auth::routes();
PatientRoute::routes();
VolunteerRoute::routes();
HomeRoute::routes();

Route::resource('city','CityController');
Route::resource('township','TownshipController');
Route::resource('center','CenterController');

Route::get('excel/center','CenterController@excel_center');
Route::get('excel/city','CityController@excel_city');
Route::get('excel/township','TownshipController@excel_township');





