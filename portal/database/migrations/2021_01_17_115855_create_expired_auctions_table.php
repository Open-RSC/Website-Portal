<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpiredAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expired_auctions', function (Blueprint $table) {
            $table->unsignedInteger('playerID');
            $table->integer('claim_id', true);
            $table->integer('item_id');
            $table->integer('item_amount');
            $table->string('time');
            $table->string('claim_time')->default('0');
            $table->tinyInteger('claimed')->default(0);
            $table->string('explanation')->default(' ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expired_auctions');
    }
}
