<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Newsletting;
use Faker\Generator as Faker;

$factory->define(Newsletting::class, function (Faker $faker) {
    return [
        'email'=>$faker->email
    ];
});
