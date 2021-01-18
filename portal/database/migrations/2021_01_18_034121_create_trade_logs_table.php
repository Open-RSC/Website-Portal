<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('player1', 12)->nullable()->index('player1');
            $table->string('player2', 12)->nullable()->index('player2');
            $table->string('player1_items')->nullable();
            $table->string('player2_items')->nullable();
            $table->string('player1_ip', 39)->default('0.0.0.0')->index('player1_ip');
            $table->string('player2_ip', 39)->default('0.0.0.0')->index('player2_ip');
            $table->integer('time')->nullable()->index('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trade_logs');
    }
}
