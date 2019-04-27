<?php

use App\Band;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Band Factory
|--------------------------------------------------------------------------
|   Used for generating initial seed data for the bands table.
|
*/

$factory->define(Band::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'website' => $faker->domainName(),
        'still_active' => (bool)random_int(0, 1)
    ];
});
