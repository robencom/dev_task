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

Route::get('/home', function () {
    return view('home');
});


// Registration routes
Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/activate/{code}', 'RegistrationController@activateUser')->name('activate');

// Sessions  routes
Route::get('/login', 'SessionsController@login');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

// Passwords routes
Route::get('/change_password', 'PasswordsController@changePassword');

Route::post('/change_password', 'PasswordsController@store');

Route::get('/forgot_password', 'PasswordsController@forgotPassword');

Route::post('/send_reset_email', 'PasswordsController@sendResetEmail');

Route::get('/reset/{email}/{newPassword}', 'PasswordsController@resetPassword')->name('reset');

// Images routes
Route::get('/upload', 'ImagesController@index');

Route::post('/upload', 'ImagesController@upload');


