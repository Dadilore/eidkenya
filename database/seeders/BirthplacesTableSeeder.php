<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BirthplacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('birthplaces')->insert([

            [
                'user_id' => '2',
                'district_of_birth' => 'Shiganshina',
                'tribe' => 'Luo',
                'clan' => 'Eldia',
                'family' => 'Paradis',
                'home_district' => 'Shiganshina',
                'division' => 'Marley',
                'constituency' => 'Maseno',
                'location' => 'Maseno',
                'sub_location' => 'Maseno',
                'village' => 'Maseno',
                'home_address' => 'Private Bag Maseno',
            ],
        ]);
    }
}
