<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Testing;
use Faker\Generator as Faker;

$factory->define(Testing::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'description' => $faker->text(600),
        'url' => $faker->url,
        'category' => $faker->randomElement(['Functionality', 'Usability']),

    ];
});
