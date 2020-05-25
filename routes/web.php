<?php

use Illuminate\Support\Facades\Route;
use Routes\Volunteer\VolunteerRoute;
use Routes\Patient\PatientRoute;
use Routes\Home\HomeRoute;


Auth::routes(['verify'=>true]);
PatientRoute::routes();
VolunteerRoute::routes();
HomeRoute::routes();

Route::resource('city','CityController');
Route::resource('township','TownshipController');
Route::resource('center','CenterController');





