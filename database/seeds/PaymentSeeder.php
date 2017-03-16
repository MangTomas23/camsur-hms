<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('payments')->insert([
        'patient_id' => 1,
        'date' => '02-03-2017',
        'total' => 50000,
        'hospital_id' => 1,
        'status' => ''
      ]);
    }
}
