<?php

namespace Routes\Volunteer;

use Route;

class VolunteerRoute
{
    static function routes()
    {
        Route::resource('volunteer','VolunteerController');
        Route::get('/getVolunteers/{id}','VolunteerController@getVolunteers');
        Route::get('/getAllVolunteers','VolunteerController@getAllLists');
        Route::post('/searchVolunteer','VolunteerController@searchVolunteer');
        Route::post('/searchAllVolunteers','VolunteerController@searchAllVolunteers');
    }
}