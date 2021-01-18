<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 16);
            $table->string('tag', 5);
            $table->string('leader', 12);
            $table->unsignedTinyInteger('kick_setting')->default(1);
            $table->unsignedTinyInteger('invite_setting')->default(1);
            $table->unsignedTinyInteger('allow_search_join')->default(2);
            $table->unsignedMediumInteger('matches_won')->default(0);
            $table->unsignedMediumInteger('matches_lost')->default(0);
            $table->unsignedInteger('clan_points')->default(0);
            $table->unsignedMediumInteger('bank_size')->default(10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clan');
    }
}
