<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'guest'), function()
{
	// route to show the login form
	Route::get('login', array('uses' => 'HomeController@showLogin'));
});
// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));


//Route group to login page if not authenticated.
Route::group(array('before' => 'auth'), function()
{

	
	Route::get('logout', array('uses' => 'HomeController@doLogout'));

	//If user is on subdomain go to user page else redirect to front page

	//Routes seen by users should always use the username subdomain.
	Route::group(array('domain' => '{user}.jolt'), function() {
	    Route::get('/', 'UserController@showProfile');
	    Route::get('/{site_name}', 'SiteController@showPublicAlias');
	    Route::get('/{site_name}/{file_name}', 'SiteFileController@showPublicAlias');
	});
	Route::get('/', 'HomeController@viewHome');

	Route::get('/site/edit/{id}', 'siteController@edit');

	Route::get('/file/{id}', 'SiteFileController@showPublic');
	
	Route::get('/file/edit/{id}', 'SiteFileController@edit');

});


//api prefix should be used for JSON resources
Route::group(array('prefix' => 'api'), function() {
	Route::resource('file', 'SiteFileController');
});

