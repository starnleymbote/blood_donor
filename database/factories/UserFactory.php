<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
<<<<<<< HEAD
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone' => $faker->unique()->e164PhoneNumber,
        'county' => $faker->city,
        'sub_county' => $faker->city,
        //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
=======

    $gender = ['Male', 'Female'];
    $blood_group = ['A', 'B', 'AB', 'O'];

    return [
        'name' => $faker->name,
        'gender' => $gender[$faker->numberBetween($min = 0, $max = 1)],
        'blood_type' => $blood_group[$faker->numberBetween($min = 0, $max = 3)],
        'location' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
>>>>>>> 326aa9f8760e18fbcca9306bba54138fe8f90acc
        'remember_token' => Str::random(10),
    ];
});
