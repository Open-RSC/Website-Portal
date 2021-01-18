<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateMessageLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_message_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender', 12)->index('sender');
            $table->string('message')->index('message');
            $table->string('reciever', 12)->index('reciever');
            $table->unsignedInteger('time')->default(0)->index('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('private_message_logs');
    }
}
