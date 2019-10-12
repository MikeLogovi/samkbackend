<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Team;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    $name=$faker->name;
    $user=factory(App\Models\User::class)->create();
    return [
        'user_id'=>$user->id,
        'name'=>$name,
        'country'=>$faker->country,
        'description'=>$faker->text,
        'source'=>'uploads/teams/img'.rand(1,10).'.jpg',
        'slug'=>str_slug($name)
    ];
});
