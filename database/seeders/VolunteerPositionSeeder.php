<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VolunteerPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('volunteer_positions')->insert([
            [
                'name'=> 'position 1',
            ],
            [
                'name'=> 'position 2',
            ],
            
            [
                'name'=> 'position 3',
            ]
    ]);
    }
}
