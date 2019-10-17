<?php

use Illuminate\Database\Seeder;

use App\BloodBank;

class BloodBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BloodBank::class, 5)->create();
    }
}
