<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\DonationCentre;
use App\User;
use App\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'donor_id' =>User::select('id')->get()->random()->id,
        'centre_id' => DonationCentre::select('id')->get()->random()->id,
        'appointment_date' => $faker->dateTime('H:i:s'),
        'purpose' => $faker->text(100),
        
    ];
});
