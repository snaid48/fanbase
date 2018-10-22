<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'news_title' => $faker->text($maxNbChars = 100),
        'news_field' => $faker->text($maxNbChars = 300),
        'author' => $faker->randomDigit,
    ];
});
