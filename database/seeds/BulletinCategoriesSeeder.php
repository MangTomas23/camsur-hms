<?php

use Illuminate\Database\Seeder;

class BulletinCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('bulletin_categories')->insert([
        ['name' => 'Announcement'],
        ['name' => 'Memo']
      ]);
    }
}
