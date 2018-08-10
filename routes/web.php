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


Route::get('/', 'LoginController@index')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/login_user', 'LoginController@loginUser')->name('login-user');
Route::get('/signup', 'SignupController@index')->name('signup');
Route::get('/user-signup', 'SignupController@userSignup')->name('user');
Route::post('/create-user', 'SignupController@userSign')->name('create-user');
Route::get('/model-signup', 'SignupController@modelSignup')->name('model');


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', 'PanelController@index')->name('dashboard');

        // Model Module
        Route::group(['namespace' => 'model', 'prefix' => 'model', 'as' => 'model.'], function () {
            // Profile Module
            Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
                Route::get('/', 'ProfileController@index')->name('index');
                Route::get('/edit', 'ProfileController@editProfile')->name('edit');
                Route::get('/show', 'ProfileController@show')->name('show');
                Route::patch('/', 'ProfileController@update')->name('update');
                Route::post('/upload', 'ProfileController@upload')->name('upload');
                Route::delete('/', 'ProfileController@destroy')->name('destroy');
            });
            // Message Module
            Route::group(['prefix' => 'message', 'as' => 'message.'], function () {
                Route::get('/index', 'MessageController@index')->name('index');
            });
            // Job Module
            Route::group(['prefix' => 'job', 'as' => 'job.'], function () {
                Route::get('/index', 'JobController@index')->name('index');
            });
        });

        // Client Module
        Route::group(['namespace' => 'client', 'prefix' => 'client', 'as' => 'client.'], function () {
            // Job Module
            Route::group(['prefix' => 'job', 'as' => 'job.'], function () {
                Route::get('/create', 'JobController@create')->name('create');
                Route::get('{job}/edit', 'JobController@edit')->name('edit');
                Route::post('/store', 'JobController@store')->name('store');
                Route::patch('/{job}', 'JobController@update')->name('update');
                Route::delete('/{job}', 'JobController@destroy')->name('destroy');
                Route::get('/search', 'JobController@search')->name('search');
            });
            Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
                Route::get('/index', 'ProfileController@index')->name('index');
                Route::delete('/index', 'ProfileController@destroy')->name('destroy');
            });
            // Message Module
            Route::group(['prefix' => 'message', 'as' => 'message.'], function () {
                Route::get('/index', 'MessageController@index')->name('index');
            });
        });
        Route::group(['prefix' => 'media', 'as' => 'media.'], function () {
            Route::get('/image/{folder}/{filename}', 'ImageHandler@getDefaultImage')->name('image.default');
            Route::post('/image/{filename}/remove', 'ImageHandler@removeImage');
        });
    });
});
