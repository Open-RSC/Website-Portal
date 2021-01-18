<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIgnoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ignores', function (Blueprint $table) {
            $table->unsignedInteger('playerID');
            $table->unsignedBigInteger('ignore')->index('ignore');
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
        Schema::dropIfExists('ignores');
    }
}
