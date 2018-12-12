<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Party::class, function (Faker $faker) {
    static $date_time;
    $date_time ?: $date_time = date("Y-m-d H:i:s");

    return [
        'site_id' => 1,
        'available_seats' => 1,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});