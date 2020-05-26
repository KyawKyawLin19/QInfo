<?php

namespace Routes\Patient;

use Route;

class PatientRoute
{
    static function routes()
    {
        Route::resource('patient','PatientController');
        Route::get('/getPatients/{id}','PatientController@getPatients');
        Route::get('/getAllLists','PatientController@getAllLists');
        Route::post('/search','PatientController@searchPatient');
        Route::post('/searchAll','PatientController@searchAllPatients');
        Route::get('excel/patient','PatientController@excel');
    }
}