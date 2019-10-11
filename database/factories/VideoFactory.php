<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    $name=$faker->name;
    return [
        'title'=>$name,
        'description'=>$faker->text,
        'brand_image'=>'uploads/videos/img'.rand(1,3).'.jpg',
        'source'=>'uploads/videos/video'.rand(1,3).'.mp4',
        'slug'=>str_slug($name)

    ];
});
