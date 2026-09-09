<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Brand ID variables
        $richmanId = Brand::where('slug', 'richman')->first()->id;
        $yellowId = Brand::where('slug', 'yellow')->first()->id; 
        $westecsId = Brand::where('slug', 'westecs')->first()->id;
        $aarongId = Brand::where('slug', 'arong')->first()->id;
        $leReveId = Brand::where('slug', 'le-reve')->first()->id;
        $ecstasyId = Brand::where('slug', 'ecstasy')->first()->id;
        $sailorId = Brand::where('slug', 'sailor')->first()->id;
        
        // Category ID variables
        $menShirtsId = Category::where('slug', 'men-shirts')->first()->id;
        $menTshirtsId = Category::where('slug', 'mens-t-shirts')->first()->id;
        $mensPoloId = Category::where('slug', 'mens-polo-shirts')->first()->id; 
        $mensPanjabiId = Category::where('slug', 'mens-panjabi')->first()->id;

        $womenSareeId = Category::where('slug', 'women-saree')->first()->id;
        $womenDressesId = Category::where('slug', 'women-dresses')->first()->id;
        $womenTshirtsId = Category::where('slug', 'women-t-shirts')->first()->id;

        $kidsShirtsId = Category::where('slug', 'kids-t-shirts')->first()->id; 
        $kidsTshirtsId = Category::where('slug', 'kids-shirts')->first()->id; 
        $kidsPantsId = Category::where('slug', 'kids-pants')->first()->id;


        // Mens > Shirts
        $product = Product::create([
            'name' => 'Cotton Formal Shirt - Sky Blue',
            'slug' => 'cotton-formal-shirt-sky-blue',
            'sku' => 'MSH-001',
            'short_desc' => 'Comfortable cotton formal shirt, suitable for office and parties.',
            'has_variants' => true,
            'category_id' => $menShirtsId,
            'brand_id' => $richmanId,
            'is_active' => true,
        ]);

        foreach (['White', 'Sky Blue', 'Black'] as $color) {
            foreach (['M', 'L', 'XL'] as $size) {
                $product->productVariants()->create([
                    'sku' => 'MSH-001-' . strtoupper(substr($color, 0, 2)) . $size,
                    'color' => $color,
                    'size' => $size,
                    'stock_quantity' => rand(5, 25),
                ]);
            }
        }

        // Men > T-Shirts
        Product::create([
            'name' => 'Basic Round Neck T-Shirt',
            'slug' => 'basic-round-neck-t-shirt',
            'sku' => 'MTS-001',
            'short_desc' => 'Basic round-neck T-shirt in soft cotton fabric',
            'description' => 'Perfect for everyday wear. Breathable fabric, easy to wash.',
            'price' => 500,
            'discount_price' => null,
            'has_variants' => true,
            'category_id' => $menTshirtsId,
            'barand_id' => $yellowId,
            'is_active' => true,
        ]);

        // Men > Polo Shirts 
        Product::create([
            'name' => 'Classic Pique Polo Shirt',
            'slug' => 'classic-pique-polo-shirt',
            'sku' => 'MPS-001',
            'short_desc' => 'Premium Pique Cotton Polo Shirt',
            'description' => 'The classic-fit polo shirt is suitable for both casual and semi-formal occasions.',
            'price' => 850,
            'discount_price' => 720,
            'has_variants' => true,
            'category_id' => $mensPoloId,
            'brand_id' => $westecsId,
            'is_active' => true,
        ]);

        // Men > Pants
        Product::create([
            'name' => 'Cotton Semi-Fitted Panjabi',
            'slug' => 'cotton-semi-fitted-panjabi',
            'sku' => 'MPJ-001',
            'short_desc' => 'Comfortable Panjabis for Eid and festivals',
            'description' => 'Semi-fitted Punjabi with light embroidery work, made from pure cotton fabric.',
            'price' => 1800,
            'discount_price' => 1500,
            'has_variants' => true,
            'category_id' => $mensPanjabiId,
            'brand_id' => $aarongId,
            'is_active' => true,
            'is_featured' => true,
        ]);



        // Women > Saree 
        Product::create([
            'name' => 'Handloom Cotton Saree',
            'slug' => 'handloom-cotton-saree',
            'sku' => 'WSR-001',
            'short_desc' => 'Traditional Handloom Cotton Saree',
            'description' => 'Authentic cotton saree woven on a traditional handloom; suitable for both daily wear and special occasions.',
            'price' => 2200,
            'discount_price' => 1899,
            'has_variants' => false, // Sarees generally do not come in different sizes.
            'stock_quantity' => 40,
            'category_id' => $womenSareeId,
            'brand_id' => $aarongId,
            'is_active' => true,
            'is_featured' => true,
        ]);

        // Women > Dresses
        Product::create([
            'name' => 'A-Line Casual Dress',
            'slug' => 'a-line-casual-dress',
            'sku' => 'WDR-001',
            'short_desc' => 'Comfortable A-line casual dress',
            'price' => 1600,
            'discount_price' => null,
            'has_variants' => true,
            'category_id' => $womenDressesId,
            'brand_id' => $leReveId,
            'is_active' => true,
        ]);

        // Women > T-shirts
        Product::create([
            'name' => 'Oversized Graphic T-Shirt',
            'slug' => 'oversized-graphic-t-shirt-women',
            'sku' => 'WTS-001',
            'short_desc' => 'Trendy oversized graphic T-shirt',
            'price' => 650,
            'discount_price' => 550,
            'has_variants' => true,
            'category_id' => $womenTshirtsId,
            'brand_id' => $yellowId,
            'is_active' => true,
        ]);


        // Kids > T-Shirts, Shirts, Pants
        Product::create([
            'name' => 'Kids Cartoon Print T-Shirt',
            'slug' => 'kids-cartoon-print-t-shirt',
            'sku' => 'KTS-001',
            'short_desc' => 'Fun cartoon-print T-shirts for children',
            'price' => 400,
            'discount_price' => 350,
            'has_variants' => true, // size: 2-3Y, 4-5Y, 6-7Y, 8-9Y
            'category_id' => $kidsTshirtsId,
            'brand_id' => $ecstasyId,
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Kids Casual Check Shirt',
            'slug' => 'kids-casual-check-shirt',
            'sku' => 'KSH-001',
            'short_desc' => "Children's casual check shirt",
            'price' => 550,
            'has_variants' => true,
            'category_id' => $kidsShirtsId,
            'brand_id' => $ecstasyId,
            'is_active' => true,
        ]);

        Product::create([
            'name' => 'Kids Comfort Fit Pants',
            'slug' => 'kids-comfort-fit-pants',
            'sku' => 'KPT-001',
            'short_desc' => 'Comfortable-fit pants for children',
            'price' => 500,
            'has_variants' => true,
            'category_id' => $kidsPantsId,
            'brand_id' => $sailorId,
            'is_active' => true,
        ]);
    }
}
