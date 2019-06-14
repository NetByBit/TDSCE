<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Idea;
use Faker\Generator as Faker;

$factory->define(Idea::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'description' => $faker->text(600),
    ];
});
