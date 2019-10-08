<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    $name=$faker->name;
    return [
        'name'=>$name,
        'country'=>$faker->country,
        'description'=>$faker->text,
        'source'=>'uploads/teams/img'.rand(1,10).'.jpg',
        'slug'=>str_slug($name)
    ];
});
