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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('firstName', 50);
            $table->string('lastName', 50)->nullable();
            $table->string('country', 50)->default('Bangladesh');
            $table->string('pinCode', 50)->default('1234')->invisible();
            $table->timestamp('create_date')->useCurrent();
            $table->timestamp('update_date' )->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
