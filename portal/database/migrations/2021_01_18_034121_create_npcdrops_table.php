<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpcdropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npcdrops', function (Blueprint $table) {
            $table->integer('npcdef_id')->nullable();
            $table->string('amount')->nullable();
            $table->integer('id')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('db_index', true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('npcdrops');
    }
}
