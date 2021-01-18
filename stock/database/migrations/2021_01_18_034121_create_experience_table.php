<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience', function (Blueprint $table) {
            $table->unsignedInteger('playerID')->index('playerID');
            $table->unsignedInteger('attack')->default(0);
            $table->unsignedInteger('defense')->default(0);
            $table->unsignedInteger('strength')->default(0);
            $table->unsignedInteger('hits')->default(4616);
            $table->unsignedInteger('ranged')->default(0);
            $table->unsignedInteger('prayer')->default(0);
            $table->unsignedInteger('magic')->default(0);
            $table->unsignedInteger('cooking')->default(0);
            $table->unsignedInteger('woodcut')->default(0);
            $table->unsignedInteger('fletching')->default(0);
            $table->unsignedInteger('fishing')->default(0);
            $table->unsignedInteger('firemaking')->default(0);
            $table->unsignedInteger('crafting')->default(0);
            $table->unsignedInteger('smithing')->default(0);
            $table->unsignedInteger('mining')->default(0);
            $table->unsignedInteger('herblaw')->default(0);
            $table->unsignedInteger('agility')->default(0);
            $table->unsignedInteger('thieving')->default(0);
            $table->unsignedInteger('runecraft')->default(0);
            $table->unsignedInteger('harvesting')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experience');
    }
}
