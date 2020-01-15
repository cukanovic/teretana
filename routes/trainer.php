<?php

Route::middleware('guest:trainer')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('perform-login');
});

Route::middleware('auth:trainer')->group(function () {
    Route::delete('logout', 'LoginController@logout')->name('logout');

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('trainings', 'TrainingsController')
        ->only('index', 'show');

    Route::resource('bookings', 'BookingsController')
        ->only('index', 'show');
});