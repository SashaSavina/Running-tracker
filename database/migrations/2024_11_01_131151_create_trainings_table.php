<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->date('date');
            $table->integer('distance');
            $table->LONGTEXT('comment')->nullable();
            $table->unsignedInteger('duration');
            $table->integer('average_pules');
            $table->float('average_temp');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
