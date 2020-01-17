<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('web', 'auth:web')->group(function () {
    Route::delete('bookings/{booking}/cancel', 'BookingsController@delete')->name('bookings.cancel');
});

Route::middleware('web', 'auth:admin')->group(function () {
    Route::delete('trainings/{training}', 'TrainingsController@delete')->name('trainings.delete');

    Route::patch('bookings/{booking}/accept', 'BookingsController@accept')->name('bookings.accept');
    Route::patch('bookings/{booking}/complete', 'BookingsController@complete')->name('bookings.complete');
    Route::delete('bookings/{booking}', 'BookingsController@delete')->name('bookings.delete');

    Route::delete('trainers/{trainer}', 'TrainersController@delete')->name('trainers.delete');
});
