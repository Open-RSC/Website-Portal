<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerCacheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_cache', function (Blueprint $table) {
            $table->unsignedInteger('playerID');
            $table->tinyInteger('type');
            $table->string('key', 32);
            $table->string('value', 150);
            $table->integer('dbid', true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_cache');
    }
}
