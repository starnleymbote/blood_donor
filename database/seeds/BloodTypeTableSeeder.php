<?php

use Illuminate\Database\Seeder;
Use App\BloodType;

class BloodTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BloodType::class,10)->create();
        //factory(BloodTypeAmount::class,10);
    }
}
