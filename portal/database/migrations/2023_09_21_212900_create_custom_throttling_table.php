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
        Schema::create('custom_throttling', function (Blueprint $table) {
            $table->id();
            $table->string('route_name')->unique();
            $table->integer('max_attempts');
            $table->integer('decay_minutes');
            $table->timestamps();
            //Index for route_name column for faster lookups
            $table->index('route_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_throttling');
    }
};
