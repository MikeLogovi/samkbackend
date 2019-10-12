<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $name=$faker->name;
    $user=factory(App\Models\User::class)->create();
    return [
        'user_id'=>$user->id,
        'author_name'=>$name,
        'author_function'=>$faker->jobTitle,
        'comment'=>$faker->text,
        'source'=>'uploads/comments/img'.rand(1,10).'.jpg',
        'slug'=>str_slug($name)
    ];
});
