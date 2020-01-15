<?php

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login')->name('perform-login');

Route::middleware('auth:admin')->group(function () {
    Route::delete('logout', 'LoginController@logout')->name('logout');

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('trainings', 'TrainingController');

    Route::resource('trainers', 'TrainersController');

    Route::resource('bookings', 'BookingController')
         ->except('create', 'store', 'edit');
});
