<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('computer_equipments')->insert([
            [
                'name'=> 'Central Processing Unit (CPU)',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Memory (RAM)',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Storage Devices',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Graphics Processing Unit (GPU)',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Power Supply Unit (PSU)',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Keyboard',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Mouse',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Printer',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Speakers',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Network Interface Card (NIC)',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Scanner',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Webcam',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'External Hard Drive',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'USB Flash Drive',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Optical Drive',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Webcam',
                'application_type_id'=> '1',
            ],
            [
                'name'=> 'Compute',
                'application_type_id'=> '2',
            ]
    ]);
    }
}
