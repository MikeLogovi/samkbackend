<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Slider::class, function (Faker $faker) {
    $name=$faker->name;
    return [
        'title'=>$name,
        'description'=>$faker->text,
        'source'=>'uploads/sliders/video'.rand(1,3).'.mp4',
        'slug'=>str_slug($name)
    ];
});
