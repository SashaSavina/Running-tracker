<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique()->nullable();
            $table->string('password');
            $table->text('photo')->nullable();
            $table->string('user_role')->nullable();
            $table->integer('height')->nullable();;
            $table->integer('weight')->nullable();;
            $table->char('gender')->nullable();;
            $table->date('date_of_birth')->nullable();
            $table->boolean('activity')->default(true);
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};