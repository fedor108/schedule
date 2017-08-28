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

Route::resource('practices', 'PracticeController');
Route::resource('events', 'EventController');
Route::resource('schedules', 'ScheduleController');
Route::resource('users', 'UserController');

Route::get('/days/{date?}', 'ScheduleController@days');
Route::get('/regular', 'ScheduleController@regular');
