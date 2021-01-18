<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpclocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npclocs', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->integer('startX')->nullable();
            $table->integer('minX')->nullable();
            $table->integer('maxX')->nullable();
            $table->integer('startY')->nullable();
            $table->integer('minY')->nullable();
            $table->integer('maxY')->nullable();
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
        Schema::dropIfExists('npclocs');
    }
}
