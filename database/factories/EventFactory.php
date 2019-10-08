<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $name=$faker->name;
    return [
        'name'=>$name,
        'description'=>$faker->text,
        'event_date'=>$faker->date,
        'source'=>'uploads/events/img'.rand(1,10).'.jpg',
        'price'=>$faker->numberBetween(1,100000),
        'slug'=>str_slug($name)
    ];
});
