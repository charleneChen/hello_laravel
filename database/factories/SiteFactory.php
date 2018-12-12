<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Site::class, function (Faker $faker) {
    static $date_time;
    $date_time ?: $date_time = date("Y-m-d H:i:s");

    return [
        'name' => '体育馆',
        'seats' => 1,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
