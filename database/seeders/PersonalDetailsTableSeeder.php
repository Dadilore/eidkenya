<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PersonalDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personal_details')->insert([

            [
                'user_id' => '2',
                // 'surname' => 'Jeager',
                // 'name' => 'Eren',
                // 'middle_name' => 'Founder',
                // 'date_of_birth' => '30/03/2000',
                // 'gender' => 'male',
                'fathers_name' => 'Grisha Jeager',
                'mothers_name' => 'Carla Jeager',
                'marital_status' => 'single',
                'husbands_names' => '',
                'husbands_id_number' => '',
                'occupation' => 'web developer',
                // 'telephone_number' => '0743316661',
                // 'email' => 'erenjeager@gmail.com',
            ],
        ]);
    }
}
