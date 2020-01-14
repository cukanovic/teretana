<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Booking::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement([
            1, 2, 3
        ]),
        'schedule' => $faker->dateTime,
        'user_id' => function() {
            return factory(\App\Customer::class)->create()->id;
        },
        'training_id' => function() {
            return factory(\App\Training::class)->create()->id;
        },
    ];
});
