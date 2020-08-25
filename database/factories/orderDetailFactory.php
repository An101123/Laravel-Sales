<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\orderDetail;
use Faker\Generator as Faker;

$factory->define(orderDetail::class, function (Faker $faker) {

    return [
        'id_product' => $faker->randomDigitNotNull,
        'id_order' => $faker->randomDigitNotNull,
        'quantity' => $faker->randomDigitNotNull,
        'price' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
