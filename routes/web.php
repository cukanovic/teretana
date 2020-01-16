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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('trainings', 'TrainingsController')
    ->only('index', 'show');

Route::resource('trainers', 'TrainersController')
    ->only('index', 'show');

Route::middleware('auth:web')->group(function () {
    Route::get('/google/callback', 'GoogleAuthController@callback')->name('google.callback');

    Route::resource('bookings', 'BookingsController')
        ->except('edit', 'update');

    Route::get('/bookings/{booking}/sync', 'GoogleCalendarController@sync')->name('google.sync');
});