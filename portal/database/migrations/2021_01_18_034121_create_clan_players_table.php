<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClanPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clan_players', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('clan_id');
            $table->string('username', 12);
            $table->unsignedTinyInteger('rank');
            $table->unsignedMediumInteger('kills')->default(0);
            $table->unsignedMediumInteger('deaths')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clan_players');
    }
}
