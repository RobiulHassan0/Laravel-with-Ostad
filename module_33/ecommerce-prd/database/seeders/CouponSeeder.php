<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::create([
            'code' => 'SAVE10',
            'dsicount_type' => 'percentage',
            'discount_value' => 10,
            'max_discount_amount' => 200,
            'min_order_amount' => 500,
            'usage_limit' => 500,
            'usage_limit_per_user' => 1,
            'starts_at' => now(),
            'expires_at' => now()->addMonth(3),
            'is_active' => true,
        ]);

        Coupon::create([
            'code' => 'FLAT50',
            'discount_type' => 'fixed',
            'discount_value' => 50,
            'min_order_amount' => 300,
            'usage_limit_per_user' => 2,
            'starts_at' => now(),
            'expires_at' => now()->addMonths(1),
            'is_active' => true,
        ]);

        Coupon::create([
            'code' => 'WELCOME15',
            'discount_type' => 'percentage',
            'discount_value' => 15,
            'max_discount_amount' => 300,
            'min_order_amount' => 1000,
            'usage_limit' => 100,
            'usage_limit_per_user' => 1,
            'starts_at' => now(),
            'expires_at' => now()->addMonths(6),
            'is_active' => true,
        ]);
    }
}
