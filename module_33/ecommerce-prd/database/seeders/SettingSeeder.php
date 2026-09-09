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
        Setting::create([
            'site_name' => 'FashionEasy',
            'site_logo' => 'settings/logo.png',
            'site_favicon' => 'settings/favicon.ico',
            'contact_email' => 'support@fashioneasy.com.bd',
            'contact_phone' => '01700000000',
            'contact_address' => 'House 12, Road 5, Dhanmondi, Dhaka',
            'facebook_url' => 'https://facebook.com/fashioneasy',
            'instagram_url' => 'https://instagram.com/fashioneasy',
            'whatsapp_number' => '01700000000',
            'default_delivery_charge' => 60.00,
        ]);
    }
}
