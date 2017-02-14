<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    Session::set('locale', 'pl');
    return view('index');
});

Route::group(['middleware' => 'language'], function () {
    Route::get('/pl', function () {
        Session::set('locale', 'pl');
        return view('index');
    });
});

Route::group(['middleware' => 'language'], function () {
    Route::get('/en', function () {
        Session::set('locale', 'en');
        return view('index');
    });
});

//Route::get('/pl', function (){
//    app()->setLocale('pl');
//    Debugbar::addMessage('Another message', app()->getLocale());
//    return view('index');
//});

Route::group(['middleware' => ['web']], function () {

// Login Routes...
    Route::get('admin', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('admin', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('admin/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

//// Registration Routes...
//    Route::get('admin/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
//    Route::post('admin/register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
//
//// Password Reset Routes...
//    Route::get('admin/password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
//    Route::post('admin/password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
//    Route::get('admin/password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
//    Route::post('admin/password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::group(['prefix' => 'api/'], function ()
{
    Route::resource('basket', 'BasketController');
    Route::resource('city', 'CityController');
    Route::resource('event', 'EventController');
    Route::resource('related_event', 'RelatedEventController');
    Route::resource('holiday', 'HolidayController');
    Route::resource('hotel', 'HotelController');
    Route::resource('photographer', 'PhotographerController');
    Route::resource('transport', 'TransportController');
});

Route::get('/admin/index', 'AdminController@index');

Route::get('/language/get', 'LanguageController@getLanguage');

Route::delete('/delete_picture/{id}', 'PictureController@deletePicture');


Route::post('/language', array (
    'Middleware' => 'LanguageSwitcher',
    'uses'=>'LanguageController@index'
));




