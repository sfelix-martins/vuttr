<?php

use Faker\Generator as Faker;

$factory->define(App\Tool::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->sentence,
        'link' => $faker->url,
        'tags' => $faker->words(),
    ];
});
