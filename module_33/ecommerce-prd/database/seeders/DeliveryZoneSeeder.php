<?php

namespace Database\Seeders;

use App\Models\DeliveryZone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dhaka = DeliveryZone::create(['name' => 'Dhaka City', 'charge' => 60, 'is_default' => true]);
        $dhaka->deliveryZoneDistricts()->create(['district_name' => 'Dhaka']); 

        $nearBy = DeliveryZone::create(['name' => 'Gazipur/Savar/Munshiganj', 'charge' => 100, 'is_active' => true]);
        $nearBy->deliveryZoneDistricts()->createMany([
            ['district_name' => 'Gazipur'], 
            ['district_name' => 'Savar'], 
            ['district_name' => 'Mushiganj'],
        ]);

        DeliveryZone::create([
            'name' => 'Nationwide',
            'charge' => 120,
            'is_default' => true,
            'is_active' => true, 
        ]);
    }
}
