<?php

use App\Album;
use App\Band;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Band Factory
|--------------------------------------------------------------------------
|   Used for generating initial seed data for the albums table.
|
*/

$factory->define(Album::class, function (Faker $faker) {
    $newAlbum = [
        'band_id' => Band::inRandomOrder()->first()->id,
        'name' => ucwords($faker->bs()),
        'recorded_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'number_of_tracks' => $faker->numberBetween(1, 30),
        'label' => $faker->company(),
        'producer' => $faker->name(),
        'genre' => $faker->randomElement(['Punk', 'Classic Rock', 'Hip Hop', 'Jazz', 'Blues']),
    ];

    // Ensures that the 'release_date' value is always after (within one year) of the 'recorded_date' value
    $newAlbum['release_date'] = ($faker->dateTimeInInterval($newAlbum['recorded_date'], "+ 1 year"))->format('Y-m-d');

    return $newAlbum;
});
