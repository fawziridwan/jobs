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

// home
Route::get('/', 'HomeController@index');

//users
Route::resource('users','UsersController');
Route::put('submission/{id}','UsersController@app_execute')->name('app_execute');

//administrator
Route::resource('admin','AdminController');
Route::get('/show/{id}','AdminController@show_user')->name('show_user');
Route::get('/download/{file}','AdminController@download')->name('file_download');

//ajax
Route::post('/status/get','AdminController@status_get')->name('get_status');
Route::post('/choose_status/{id}','AdminController@choose_status')->name('choose_status');
 
// register
Route::get('signup', 'RegisterController@signup')->name('signup');
Route::post('signup', 'RegisterController@signup_store')->name('signup.store');

// sign in
Route::get('login', 'SessionsController@login')->name('login');
Route::post('login', 'SessionsController@login_store')->name('login.store');
Route::get('logout', 'SessionsController@logout')->name('logout');

// // forgot password
// Route::get('forgot-password', 'ReminderController@create')->name('reminders.create');
// Route::post('forgot-password', 'ReminderController@store')->name('reminders.store');

// // reset password
// Route::get('reset-password/{id}/{token}', 'ReminderController@edit')->name('reminders.edit');
// Route::post('reset-password/{id}/{token}','ReminderController@update')->name('reminders.update');