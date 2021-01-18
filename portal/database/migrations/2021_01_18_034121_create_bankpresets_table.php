<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankpresetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankpresets', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('playerID');
            $table->unsignedInteger('slot');
            $table->binary('inventory')->nullable();
            $table->binary('equipment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bankpresets');
    }
}
