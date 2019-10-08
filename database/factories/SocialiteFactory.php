<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Socialite;
use Faker\Generator as Faker;

$factory->define(Socialite::class, function (Faker $faker) {
    $icons=['facebook','twitter','instagram','linkedIn'];
    $icon=$icons[rand(0,3)];
    $team=factory(App\Models\Team::class)->create();
    return [
        'team_id'=>$team->id,
        'url'=>$faker->url,
        'icon'=>$icon,
        'slug'=>str_slug($icon)
    ];
});
