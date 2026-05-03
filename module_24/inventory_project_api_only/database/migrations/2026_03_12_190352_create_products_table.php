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

            // relationship
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');

            // core info
            $table->string('name');
            $table->string('sku')->unique();
            $table->text('description')->nullable();

            // inventory and measurment
            $table->string('unit'); //pcs, kg, box etc
            $table->integer('stock_qty')->default(0);
            $table->integer('low_stock_threshold')->default(5);
            $table->decimal('weight', 10, 2)->nullable();

            // Attributes
            $table->string('color')->nullable();
            $table->string('size')->nullable();

            // pricing
            $table->decimal('price', 12, 2)->default(0);

            // Media and status
            $table->string('image_path')->nullable();
            $table->boolean('status')->default(true);
            
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
