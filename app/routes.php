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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('logout',array('as'=>'login.logout','users'=>'LoginController'));

Route::group(array('before'=>'un_auth'),function(){
    Route::get('login', array('as' => 'login.index', 'uses' => 'LoginController@index'));
    Route::get('register', array('as' => 'login.register', 'uses' => 'LoginController@register'));
    Route::post('login', array('uses' => 'LoginController@login'));
    Route::post('register', array('uses' => 'LoginController@store'));
});

Route::group(array('before' => 'admin.auth'), function()
{
    Route::get('dashboard', function()
    {
        return View::make('login.dashboard');
    });

    Route::resource('roles', 'RolesController');

    Route::resource('cities', 'CitiesController');

    Route::resource('companies', 'CompaniesController');

    Route::resource('tags', 'TagsController');

    Route::resource('offers', 'OffersController');

    Route::resource('comments', 'CommentsController');

});

Route::filter('admin.auth', function() 
{
    if (Auth::guest()) {
        return Redirect::to('login');
    }
        Route::resource('comments', 'CommentsController');

    Route::post('upload', array('uses' => 'HomeController@uploadOfferImage'));
});

Route::filter('un_auth', function() 
{
    if (!Auth::guest()) {
        Auth::logout();
    }
});
