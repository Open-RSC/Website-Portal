<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrounditemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grounditems', function (Blueprint $table) {
            $table->integer('id')->nullable();
            $table->integer('x')->nullable();
            $table->integer('y')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('respawn')->nullable();
            $table->integer('idx', true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grounditems');
    }
}
