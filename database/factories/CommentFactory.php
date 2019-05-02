<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;
use App\User;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text(300),
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
