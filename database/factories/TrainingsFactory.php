<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Training::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(3),
        'price' => $faker->randomNumber(3),
        'number_of_sessions' => $faker->randomNumber(2),
        'difficulty' => $faker->randomElement([1, 2, 3, 4]),
        'trainer_id' => function() {
            return factory(\App\Trainer::class)->create()->id;
        }
    ];
});
