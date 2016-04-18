<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
|
*/

Route::post('api/register', 'Api\TokenAuthController@register');
Route::post('api/authenticate', 'Api\TokenAuthController@authenticate');
Route::get('api/authenticate/user', 'Api\TokenAuthController@getAuthenticatedUser');

Route::get('api/sites/user', 'Api\SiteController@user');
Route::get('api/sites/recommend', 'Api\SiteController@recommend');
Route::resource('api/sites', 'Api\SiteController');