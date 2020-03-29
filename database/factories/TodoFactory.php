<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->word,
        'time' => $faker->numberBetween($min = 1, $max = 24),
        'calender_date' => $faker->date($format='2020-3-20'),
        // 'calender_date' => $faker->date($format='Y-m-d', $max='now'),
    ];
});