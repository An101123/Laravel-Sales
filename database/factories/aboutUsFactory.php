<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\aboutUs;
use Faker\Generator as Faker;

$factory->define(aboutUs::class, function (Faker $faker) {

    return [
        'content' => $faker->word,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
