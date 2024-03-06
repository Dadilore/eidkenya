<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserBiometrics;
use DB;

class UserBiometricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed user_biometrics table with demo data
        DB::table('user_biometrics')->insert([
            'user_id' => 2, 
            'passport_photo' => 'demo_fingerprint_data',
            'signature' => 'demo_iris_scan_data',

            'right_hand_index' => 'demo_fingerprint_data',
            'right_hand_middle' => 'demo_iris_scan_data',
            'right_hand_thumb' => 'demo_fingerprint_data',
            'right_hand_ring' => 'demo_iris_scan_data',
            'right_hand_pinky' => 'demo_fingerprint_data',
            'right_hand_palm' => 'demo_iris_scan_data',

            'left_hand_index' => 'demo_fingerprint_data',
            'left_hand_middle' => 'demo_iris_scan_data',
            'left_hand_thumb' => 'demo_fingerprint_data',
            'left_hand_ring' => 'demo_iris_scan_data',
            'left_hand_pinky' => 'demo_fingerprint_data',
            'left_hand_palm' => 'demo_iris_scan_data',

           
            
            // Add other fields as needed
        ]);
    }
}
