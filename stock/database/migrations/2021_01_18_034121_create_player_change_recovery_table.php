<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerChangeRecoveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_change_recovery', function (Blueprint $table) {
            $table->unsignedInteger('playerID')->primary();
            $table->string('username', 12)->default('');
            $table->string('question1', 256)->default('');
            $table->string('answer1', 512)->default('');
            $table->string('question2', 256)->default('');
            $table->string('answer2', 512)->default('');
            $table->string('question3', 256)->default('');
            $table->string('answer3', 512)->default('');
            $table->string('question4', 256)->default('');
            $table->string('answer4', 512)->default('');
            $table->string('question5', 256)->default('');
            $table->string('answer5', 512)->default('');
            $table->unsignedInteger('date_set')->default(0);
            $table->string('ip_set')->nullable()->default('0.0.0.0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_change_recovery');
    }
}
