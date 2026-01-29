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
        Schema::create('stock_movements', function (Blueprint $table) {
            // Identifiers 
            $table->id();

            // Relationships
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict');
            $table->unsignedBigInteger('invoice_id')->nullable();

            // Movement Details
            $table->enum('type', ['IN','OUT']);
            $table->integer('quantity');

            // Metadata
            $table->text('note')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
