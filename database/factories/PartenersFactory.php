<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Partner;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Partner::class, function (Faker $faker) {
    $name=$faker->name;
    $user=factory(App\Models\User::class)->create();
    return [
        'user_id'=>$user->id,
        'name'=>$name,
        'source'=>'uploads/partners/img'.rand(1,10).'.jpg',
        'slug'=>str_slug($name),
        
    ];
});
