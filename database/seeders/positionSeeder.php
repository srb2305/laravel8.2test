<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class positionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->insert([
            'title' => Str(admin),
            
        ]);
    }
}
