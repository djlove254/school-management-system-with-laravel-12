<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'school_name',    'value' => 'CBC School Management System'],
            ['key' => 'principal_name', 'value' => 'School Principal'],
            ['key' => 'school_email',   'value' => 'info@school.ac.ke'],
            ['key' => 'school_phone',   'value' => '+254700000000'],
            ['key' => 'school_address', 'value' => 'Kenya'],
            ['key' => 'school_logo',    'value' => 'logo.png'],
            ['key' => 'currency',       'value' => 'KES'],
            ['key' => 'timezone',       'value' => 'Africa/Nairobi'],
            ['key' => 'session_year',   'value' => '2026'],
            ['key' => 'school_tagline', 'value' => 'Empowering Learners Through CBC'],
            ['key' => 'fine_per_day',   'value' => '50'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }

        echo "Kenyan school settings created!\n";
    }
}
