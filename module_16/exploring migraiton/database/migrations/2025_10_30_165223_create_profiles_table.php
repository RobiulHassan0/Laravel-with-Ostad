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
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_bangladeshi');
            $table->bigInteger('vote');
            $table->binary('photo');
            $table->char('name', 50);
            $table->dateTime('voting_date_time');
            $table->date('voting_date');
            $table->double('population');
            $table->enum('group', ['A', 'B']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
