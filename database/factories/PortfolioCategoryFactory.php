<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PortfolioCategory;
use Faker\Generator as Faker;

$factory->define(PortfolioCategory::class, function (Faker $faker) {
    $name=$faker->name;
    return [
        'name'=>$name,
        'slug'=>str_slug($name)
      
    ];
});
