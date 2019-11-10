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
        
        //factory(BloodType::class,10)->create();
        BloodType::create([
            'name' => 'A+'
        ]);

        BloodType::create([
            'name' => 'A-'
        ]);

        BloodType::create([
            'name' => 'B+'
        ]);

        BloodType::create([
            'name' => 'B-'
        ]);

        BloodType::create([
            'name' => 'AB'
        ]);

        BloodType::create([
            'name' => 'O+'
        ]);

        BloodType::create([
            'name' => 'O-'
        ]);
    }
}
