<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            config('honey.spammer_blocking.table_name', 'spammers'),
            function ($table) {
                $table->id();
                $table->string('ip_address');
                $table->integer('attempts');
                $table->dateTime('blocked_at')->nullable();
                $table->timestamps();
            }
        );
    }
};
