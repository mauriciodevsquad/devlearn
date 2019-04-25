<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence,
        'url'         => $faker->url,
        'description' => $faker->text
    ];
});
