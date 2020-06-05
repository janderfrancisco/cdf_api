<?php

use Faker\Generator as Faker;
use App\Model\Student;


$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'email' => $faker->email,
        'status' => $faker->randomDigit             
    ];
});
