<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'author_name'=>$faker->name,
        'author_email'=>$faker->email,
        'content'=>$faker->text
    ];
});
