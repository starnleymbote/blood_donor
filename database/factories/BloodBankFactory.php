<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use App\BloodBank;
use App\DonationCentre;
use Faker\Generator as Faker;

$factory->define(BloodBank::class, function (Faker $faker) {
    $blood_group = ['A', 'B', 'AB', 'O'];
    return [
        'donor_id' =>User::select('id')->get()->random()->id,
        'centre_id' => DonationCentre::select('id')->get()->random()->id,
        'blood_type' => $blood_group[$faker->numberBetween($min = 0, $max = 3)],
        'blood_amount' => $faker->numberBetween($min = 100, $max = 1000),

    ];
});
