<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reporter', 12);
            $table->string('reported', 12);
            $table->unsignedInteger('time');
            $table->unsignedInteger('reason');
            $table->text('chatlog')->nullable();
            $table->integer('reporter_x')->nullable();
            $table->integer('reporter_y')->nullable();
            $table->integer('reported_x')->default(0);
            $table->integer('reported_y')->nullable()->default(0);
            $table->tinyInteger('suggests_or_mutes')->nullable();
            $table->tinyInteger('tried_apply_action')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_reports');
    }
}
