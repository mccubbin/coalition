<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $max = App\Task::max('priority');
    return [
        //'user_id' => App\User::all()->random()->id,
        'name' => $faker->jobTitle(),
        'priority' => $faker->unique()->numberBetween($max+1, $max+30)
    ];
});
