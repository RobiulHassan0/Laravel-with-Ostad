<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $men = Category::create([
            'name' => 'Men',
            'slug' => 'men',
            'description' => 'Mens\'s clothing',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Shirts',
            'slug' => 'men-shirts',
            'parent_id' => $men->id,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'T-Shirts',
            'slug' => 'mens-t-shirts',
            'parent_id' => $men->id,
            'sort_order' => 2
        ]);

        Category::create([
            'name' => 'Polo Shirts',
            'slug' => 'mens-polo-shirts',
            'parent_id' => $men->id,
            'sort_order' => 3
        ]);

        Category::create([
            'name' => 'Panjabi',
            'slug' => 'mens-panjabi',
            'parent_id' => $men->id,
            'sort_order' => 4
        ]);

        Category::create([
            'name' => 'Pants',
            'slug' => 'mens-pants',
            'parent_id' => $men->id,
            'sort_order' => 5
        ]);


        $women = Category::create([
            'name' => 'Women',
            'slug' => 'women',
            'description' => 'Women\'s clothing',
            'is_active' => true,
            'sort_order' => 2
        ]);

        Category::create([
            'name' => 'Tops',
            'slug' => 'women-tops',
            'parent_id' => $women->id,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Saree',
            'slug' => 'women-saree',
            'parent_id' => $women->id,
            'sort_order' => 2,
        ]);

        Category::create([
            'name' => 'Dresses',
            'slug' => 'women-dresses',
            'parent_id' => $women->id,
            'sort_order' => 3,
        ]);

        Category::create([
            'name' => 'T-Shirts',
            'slug' => 'women-t-shirts',
            'parent_id' => $women->id,
            'sort_order' => 4
        ]);


        // Kids
        $kids = Category::create([
            'name' => 'Kids',
            'slug' => 'kids',
            'description' => 'Kids\' clothing',
            'is_active' => true,
            'sort_order' => 3,
        ]);

        Category::create([
            'name' => 'T-Shirts',
            'slug' => 'kids-t-shirts',
            'parent_id' => $kids->id,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Shirts',
            'slug' => 'kids-shirts',
            'parent_id' => $kids->id,
            'sort_order' => 2,
        ]);

        Category::create([
            'name' => 'Pants',
            'slug' => 'kids-pants',
            'parent_id' => $kids->id,
            'sort_order' => 3,
        ]);
    }
}
