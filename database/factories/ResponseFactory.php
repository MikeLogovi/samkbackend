<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use App\Models\Response;
use Faker\Generator as Faker;

$factory->define(Response::class, function (Faker $faker) {
    $message=factory(Message::class)->create();
    return [
        'message_id'=>$message->id,
        'content'=>$faker->text
    ];
});
