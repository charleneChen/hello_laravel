<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Seat::class, function (Faker $faker) {
    static $date_time;
    $date_time ?: $date_time = date("Y-m-d H:i:s");

    return [
        'site_id' => 1,
        'block' => 'A',
        'row' => 1,
        'col' => 1,
        'is_active' => false,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});

//$factory->defineAs(App\Models\Seat::class, 'A', function (Faker $faker) {
//    static $date_time;
//    $date_time ?: $date_time = date("Y-m-d H:i:s");
//
//    return [
//        'site_id' => 1,
//        'block' => 'A',
//        'row' => 1,
//        'col' => 1,
//        'is_active' => false,
//        'created_at' => $date_time,
//        'updated_at' => $date_time,
//    ];
//});
//
//$factory->defineAs(App\Models\Seat::class, 'B', function (Faker $faker) {
//    static $date_time;
//    $date_time ?: $date_time = date("Y-m-d H:i:s");
//
//    return [
//        'site_id' => 1,
//        'block' => 'B',
//        'row' => 1,
//        'col' => 1,
//        'is_active' => false,
//        'created_at' => $date_time,
//        'updated_at' => $date_time,
//    ];
//});
//
//$factory->defineAs(App\Models\Seat::class, 'C', function (Faker $faker) {
//    static $date_time;
//    $date_time ?: $date_time = date("Y-m-d H:i:s");
//
//    return [
//        'site_id' => 1,
//        'block' => 'C',
//        'row' => 1,
//        'col' => 1,
//        'is_active' => false,
//        'created_at' => $date_time,
//        'updated_at' => $date_time,
//    ];
//});
//
//$factory->defineAs(App\Models\Seat::class, 'D', function (Faker $faker) {
//    static $date_time;
//    $date_time ?: $date_time = date("Y-m-d H:i:s");
//
//    return [
//        'site_id' => 1,
//        'block' => 'D',
//        'row' => 1,
//        'col' => 1,
//        'is_active' => false,
//        'created_at' => $date_time,
//        'updated_at' => $date_time,
//    ];
//});
