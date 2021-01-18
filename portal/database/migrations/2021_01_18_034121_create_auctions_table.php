<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->bigInteger('auctionID', true);
            $table->integer('itemID')->index('itemID');
            $table->integer('amount');
            $table->integer('amount_left');
            $table->integer('price');
            $table->unsignedInteger('seller');
            $table->string('seller_username', 12)->index('seller_username');
            $table->text('buyer_info')->index('buyer_info');
            $table->tinyInteger('sold-out')->default(0);
            $table->string('time')->default('0')->index('time');
            $table->tinyInteger('was_cancel')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
    }
}
