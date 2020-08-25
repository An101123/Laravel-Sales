<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\promotion;
use Faker\Generator as Faker;

$factory->define(promotion::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'discount' => $faker->randomDigitNotNull,
        'content' => $faker->word,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
