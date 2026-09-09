<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'Arong',
            'slug' => 'arong',
            'image' => 'brands/arong.png'
        ]);
        Brand::create(['name' => 'Yellow', 'slug' => 'yellow', 'image' => 'brands/yellow.png']);
        Brand::create(['name' => 'Ecstasy', 'slug' => 'ecstasy', 'image' => 'brands/ecstasy.png']);
        Brand::create(['name' => 'Cats Eye', 'slug' => 'cats-eye', 'image' => 'brands/cats-eye.png']);
        Brand::create(['name' => 'Sailor', 'slug' => 'sailor', 'image' => 'brands/sailor.png']);
        Brand::create(['name' => 'Le Reve', 'slug' => 'le-reve', 'image' => 'brands/le-reve.png']);
        Brand::create(['name' => 'Richman', 'slug' => 'richman', 'image' => 'brands/richman.png']);
        Brand::create(['name' => 'Westecs', 'slug' => 'westecs', 'image' => 'brands/westecs.png']);
    }
}
 