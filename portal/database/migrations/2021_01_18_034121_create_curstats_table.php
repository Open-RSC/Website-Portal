<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurstatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curstats', function (Blueprint $table) {
            $table->unsignedInteger('playerID')->index('playerID');
            $table->unsignedTinyInteger('attack')->default(1);
            $table->unsignedTinyInteger('defense')->default(1);
            $table->unsignedTinyInteger('strength')->default(1);
            $table->unsignedTinyInteger('hits')->default(10);
            $table->unsignedTinyInteger('ranged')->default(1);
            $table->unsignedTinyInteger('prayer')->default(1);
            $table->unsignedTinyInteger('magic')->default(1);
            $table->unsignedTinyInteger('cooking')->default(1);
            $table->unsignedTinyInteger('woodcut')->default(1);
            $table->unsignedTinyInteger('fletching')->default(1);
            $table->unsignedTinyInteger('fishing')->default(1);
            $table->unsignedTinyInteger('firemaking')->default(1);
            $table->unsignedTinyInteger('crafting')->default(1);
            $table->unsignedTinyInteger('smithing')->default(1);
            $table->unsignedTinyInteger('mining')->default(1);
            $table->unsignedTinyInteger('herblaw')->default(1);
            $table->unsignedTinyInteger('agility')->default(1);
            $table->unsignedTinyInteger('thieving')->default(1);
            $table->unsignedTinyInteger('runecraft')->default(1);
            $table->unsignedTinyInteger('harvesting')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curstats');
    }
}
