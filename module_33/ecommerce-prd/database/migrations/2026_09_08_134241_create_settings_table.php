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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('site_name', 100);
            $table->string('site_logo', 300)->nullable();
            $table->string('site_favicon', 300)->nullable();
            
            $table->string('contact_email', 100)->nullable();
            $table->string('contact_phone', 20)->nullable();
            $table->string('contact_address', 255)->nullable();

            $table->string('facebook_url', 255)->nullable();
            $table->string('instagram_url', 255)->nullable();
            $table->string('whatsapp_number', 20)->nullable();

            $table->decimal('default_delivery_charge', 10, 2)->default(60);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
