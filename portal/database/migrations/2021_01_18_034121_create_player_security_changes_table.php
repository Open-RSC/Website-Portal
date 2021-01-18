<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerSecurityChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_security_changes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('playerID');
            $table->string('eventAlias', 20);
            $table->unsignedInteger('date')->default(0);
            $table->string('ip')->nullable()->default('0.0.0.0');
            $table->text('message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_security_changes');
    }
}
