<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemstatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemstatuses', function (Blueprint $table) {
            $table->unsignedInteger('itemID')->primary();
            $table->unsignedInteger('catalogID');
            $table->unsignedInteger('amount')->default(1);
            $table->unsignedTinyInteger('noted')->default(0);
            $table->unsignedTinyInteger('wielded')->default(0);
            $table->unsignedInteger('durability')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemstatuses');
    }
}
