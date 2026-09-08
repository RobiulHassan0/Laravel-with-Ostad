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
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('label', 30)->nullable();
            $table->string('name', 50);
            $table->string('phone', 20);
            $table->string('address_line1',  255);
            $table->string('address_line2', 255)->nullable();
            $table->string('city', 50);
            $table->string('state', 50)->nullable();
            $table->string('postcode', 50);
            $table->string('country', 50)->default('Bangladesh');

            $table->boolean('is_default')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
