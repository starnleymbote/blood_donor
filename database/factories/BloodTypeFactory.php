<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\BloodType;

$factory->define(BloodType::class, function (Faker $faker) {
    $blood_group = ['A+', 'A-', 'B+','B-', 'AB', 'O+', 'O-'];
    return [
        'name' => $blood_group[$faker->numberBetween($min = 0, $max = 6)],
        // 'donor_id' => $faker->numberBetween($min = 10, $max = 100),

    ];
});
