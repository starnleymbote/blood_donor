<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // $this->call(UserTableSeeder::class);
        $this->call(BloodTypeTableSeeder::class);
=======
        $this->call(UsersTableSeeder::class);
        $this->call(DonationCenterTableSeeder::class);
        $this->call(AppointmentTableSeeder::class);
        $this->call(DonationCenterTableSeeder::class);
        $this->call(BloodBankTableSeeder::class);
>>>>>>> 326aa9f8760e18fbcca9306bba54138fe8f90acc
    }
}
