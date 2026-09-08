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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            $table->string('code', 30)->unique();

            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage');
            $table->decimal('discount_value', 10, 2)->unsigned();

            $table->decimal('max_discount_amount', 10, 2)->unsigned()->nullable();
            $table->decimal('min_order_amount', 10, 2)->unsigned()->nullable();

            $table->unsignedInteger('usage_limit')->nullable();

            $table->unsignedInteger('usage_limit_per_user')->nullable()->default(1);

            $table->unsignedInteger('used_count')->default(0);

            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
