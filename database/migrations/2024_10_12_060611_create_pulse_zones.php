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
        Schema::create('pulse_zones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('Z1');
            $table->integer('Z2');
            $table->integer('Z3');
            $table->integer('Z4');
            $table->integer('Z5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pulse_zones');
    }
};
