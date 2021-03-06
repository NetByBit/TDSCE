<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'description' => $faker->text(600),
        'url' => $faker->url,
    ];
});
