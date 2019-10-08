<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $name=$faker->name;
    return [
        'author_name'=>$name,
        'author_function'=>$faker->jobTitle,
        'comment'=>$faker->text,
        'source'=>'uploads/comments/img'.rand(1,10).'.jpg',
        'slug'=>str_slug($name)
    ];
});
