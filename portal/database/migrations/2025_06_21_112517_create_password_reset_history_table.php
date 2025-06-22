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
        Schema::create('password_reset_history', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('db');
            $table->string('ip');
            $table->boolean('email_sent')->default(true);
            $table->boolean('password_reset')->default(false);
            $table->uuid('token')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_history');
    }
};
