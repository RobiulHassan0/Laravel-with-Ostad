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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->restrictOnDelete()->cascadeOnUpdate(); 

            $table->foreignId('address_id')->nullable()->constrained('customer_addresses')->nullOnDelete();

            $table->string('order_number', 50)->unique();

            // SNAPSHOT of Delivery
            $table->string('recipient_name', 100);
            $table->string('recipient_phone', 20);
            $table->string('address_line1', 255);
            $table->string('address_line2', 255);
            $table->string('city', 100);
            $table->string('state', 100)->nullable();
            $table->string('postcode', 20)->nullable();
            $table->string('country', 100)->nullable();

            $table->decimal('total_amount', 10, 2);

            $table->enum('status', ['pending', 'processing', 'shipped', 'deliverd', 'cancelled'])->default('pending');

            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid');

            $table->string('payment_method', 50)->nullable(); 

            $table->string('transaction_id', 100)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
