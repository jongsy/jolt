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

	Route::get('/', 'homeController@viewHome');
	Route::get('logout', array('uses' => 'HomeController@doLogout'));

	Route::get('/page/{id}', 'pageController@showForFrame');

	Route::get('/site/edit/{id}', 'siteController@edit');
	Route::get('/page/edit/{id}', 'pageController@edit');

});

Route::group(array('prefix' => 'api'), function() {
	Route::resource('pages', 'PageController');
});

