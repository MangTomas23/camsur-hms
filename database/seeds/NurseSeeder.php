<?php

use Illuminate\Database\Seeder;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('nurses')->insert([
        'firstname' => 'Ellen',
        'middlename' => '',
        'lastname' => 'Adarna',
        'status' => 'active',
        'hospital_id' => 1
      ]);
    }
}
