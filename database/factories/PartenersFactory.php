<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Partner;
use Faker\Generator as Faker;

$factory->define(Partner::class, function (Faker $faker) {
    $name=$faker->name;
    return [
       
        'name'=>$name,
        'source'=>'uploads/partners/img'.rand(1,10).'.jpg',
        'slug'=>str_slug($name),
        
    ];
});
