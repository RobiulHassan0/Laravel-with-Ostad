<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);
            $table->string('slug', 150)->unique();

            $table->string('sku', 50)->unique()->nullable();

            $table->string('short_desc', 500);
            $table->text('description')->nullable();
            
            $table->decimal('price', 10, 2);

            $table->decimal('discount_price', 10, 2)->nullable();

            $table->unsignedInteger('stock_quantity')->default(0);

            $table->boolean('has_variants')->default(false);

            $table->string('image', 300)->nullable();
            
            $table->decimal('rating', 2, 1)->nullable();
            $table->unsignedInteger('reviews_count')->default(0);

            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);

            $table->foreignId('category_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('brand_id')->constrained()->nullOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
