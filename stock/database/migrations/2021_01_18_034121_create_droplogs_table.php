<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroplogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droplogs', function (Blueprint $table) {
            $table->integer('ID', true);
            $table->integer('itemID')->nullable();
            $table->integer('playerID')->nullable();
            $table->integer('dropAmount')->nullable();
            $table->integer('npcId')->nullable();
            $table->timestamp('ts')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('droplogs');
    }
}
