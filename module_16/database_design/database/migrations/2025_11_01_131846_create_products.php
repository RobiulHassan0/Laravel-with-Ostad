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
            $table->string('title', 200);
            $table->string('short_desc',500);
            $table->string('price',50);
            $table->boolean('discount');
            $table->string('image', 200);
            $table->boolean('stock');
            $table->float('star');
            $table->enum('remark', ['popular', 'new', 'top', 'special', 'trending', 'regular']);

            // Foreign Key
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');

            // Relation with Categories table
            $table->foreign('category_id')
            ->references('id')->on('categories')->restrictOnDelete()->restrictOnUpdate();
        
            // Relation with Brands table
            $table->foreign('brand_id')
            ->references('id')->on('brands')->restrictOnDelete()->restrictOnUpdate();
        
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
