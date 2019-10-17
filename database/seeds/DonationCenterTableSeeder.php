<?php

use Illuminate\Database\Seeder;

use App\DonationCentre;
class DonationCenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DonationCentre::class, 10)->create();
    }
}
