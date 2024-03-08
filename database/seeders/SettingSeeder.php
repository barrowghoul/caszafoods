<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $setting = Setting::create([
            'key' => 'pusher_app_key',
            'value' => '',
        ]);

        $setting = Setting::create([
            'key' => 'pusher_app_secret',
            'value' => '',
        ]);

        $setting = Setting::create([
            'key' => 'pusher_app_id',
            'value' => '',
        ]);

        $setting = Setting::create([
            'key' => 'pusher_app_cluster',
            'value' => '',
        ]);
    }
}
