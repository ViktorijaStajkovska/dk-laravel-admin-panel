<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('application_statuses')->insert([
            [
                'name'=> 'нова',
            ],
            [
                'name'=> 'невалидна',
            ],
            [
                'name'=> 'комплетирана',
            ],
    ]);
    }
}