<?php

use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('doctors')->insert([
        'firstname' => 'Jose',
        'middlename' => 'Protacio',
        'lastname' => 'Rizal',
        'rate' => 120000,
        'status' => 'active',
        'designation' => '',
        'department' => '',
        'hospital_id' => 1
      ]);
    }
}
