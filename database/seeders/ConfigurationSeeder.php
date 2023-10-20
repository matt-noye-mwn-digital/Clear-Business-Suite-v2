<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'site_name',
            'value' => 'Clear Business Suite',
        ]);
        Setting::create([
            'key' => 'site_url',
            'value' => '',
        ]);
        Setting::create([
            'key' => 'site_description',
            'value' => '',
        ]);
        Setting::create([
            'key' => 'admin_email',
            'value' => 'admin@example.com'
        ]);

    }
}
