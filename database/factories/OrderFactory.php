<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    $user_id = $faker->randomElement([1, 2, 3]);
    $num = $faker->randomElement([1, 2, 3, 4, 5]);

    return [
        'user_id' => $user_id,
        'num' => $num,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
