<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecoveryAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recovery_attempts', function (Blueprint $table) {
            $table->unsignedInteger('playerID');
            $table->string('username', 12)->default('');
            $table->unsignedInteger('time');
            $table->string('ip')->default('0.0.0.0')->index('ip');
            $table->increments('dbid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recovery_attempts');
    }
}
