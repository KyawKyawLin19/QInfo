<?php

namespace Routes\Home;

use Route;

class HomeRoute
{
    static function routes()
    {
        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index');
        Route::get('/getData/{id}','HomeController@getData');
        Route::get('/getTownships/{id}','HomeController@getTownships');
        Route::get('admin','HomeController@admin_home');
        Route::get('/getApiData','HomeController@getApiData');
    }
}