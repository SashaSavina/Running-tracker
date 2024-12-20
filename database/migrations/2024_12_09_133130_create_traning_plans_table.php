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
        Schema::create('training_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('duration', ['week', 'two_weeks', 'month'])->default('week')->nullable(); 
            $table->enum('intensity', ['low', 'medium', 'high'])->default('medium'); // Уровень нагрузки
            $table->string('name')->nullable(); // Название плана
            $table->json('plan_details')->nullable(); // Детали плана (JSON для гибкости)
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_plans');
    }
};