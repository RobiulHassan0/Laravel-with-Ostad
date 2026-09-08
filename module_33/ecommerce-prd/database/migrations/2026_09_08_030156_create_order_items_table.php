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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained()->cascadeOnDelete();

            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete(); 

            $table->foreignId('product_veriant_id')->nullable()->constrained('product_variants')->nullOnDelete();

            // SNAPSHOT
            $table->string('variant_color', 50)->nullable();
            $table->string('variant_size', 30)->nullable();

            $table->decimal('unit_price', 10, 2);
            $table->unsignedInteger('quantity');
            
            $table->decimal('subtotal', 10, 2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
