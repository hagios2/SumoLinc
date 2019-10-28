<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profile', 'ProfileController');

Route::get('/getstates/{country}', 'CountriesController@getState');

Route::get('user/profile/country', 'CountriesController@getProfileCountry');

Route::get('/allcountries', 'CountriesController@getCountry');

Route::get('/avatar/{user}/edit/', 'UserController@edit');

Route::patch('/avatar/{user}', 'UserController@update');

Route::delete('/avatar/{user}', 'UserController@destroy');

Route::get('/view/{user}/profile', 'ConnectionsController@show');

Route::post('/add/{user}/connection', 'ConnectionsController@store');

Route::get('/confirm/connections', 'ConnectionsController@confirm');

Route::patch('/confirmed/{connections}/connections', 'ConnectionsController@update');

Route::delete('/reject/{connections}/connection', 'ConnectionsController@destroy');

Route::resource('education', 'EducationController');

Route::resource('workingExperience', 'WorkingExperienceController');

Route::resource('messages', 'MessagesController'); 

/* Route::get('/message/{user}', 'MessagesController@chatWith');

Route::post('/messages', 'MessagesController@store');

Route::get('/messages', 'MessagesController@index');

*/
Route::get('/message/{user}', 'MessagesController@chatWith');