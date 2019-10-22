<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\DonationCentre;
use Faker\Generator as Faker;

$factory->define(DonationCentre::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
    ];
});
