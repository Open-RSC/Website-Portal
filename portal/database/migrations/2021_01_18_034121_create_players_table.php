<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 12)->default('');
            $table->integer('group_id')->nullable()->default(10)->index('group_id');
            $table->string('email')->nullable();
            $table->string('pass', 512);
            $table->string('salt', 250)->default('');
            $table->integer('combat')->nullable()->default(3);
            $table->integer('skill_total')->nullable()->default(27)->index('skill_total');
            $table->unsignedInteger('x')->nullable()->default(216);
            $table->unsignedInteger('y')->nullable()->default(451);
            $table->integer('fatigue')->nullable()->default(0);
            $table->integer('petfatigue')->nullable()->default(0);
            $table->tinyInteger('combatstyle')->nullable()->default(0);
            $table->unsignedTinyInteger('block_chat')->nullable()->default(0);
            $table->unsignedTinyInteger('block_private')->nullable()->default(0);
            $table->unsignedTinyInteger('block_trade')->nullable()->default(0);
            $table->unsignedTinyInteger('block_duel')->nullable()->default(0);
            $table->unsignedTinyInteger('cameraauto')->nullable()->default(1);
            $table->unsignedTinyInteger('onemouse')->nullable()->default(0);
            $table->unsignedTinyInteger('soundoff')->nullable()->default(0);
            $table->unsignedInteger('haircolour')->nullable()->default(2);
            $table->unsignedInteger('topcolour')->nullable()->default(8);
            $table->unsignedInteger('trousercolour')->nullable()->default(14);
            $table->unsignedInteger('skincolour')->nullable()->default(0);
            $table->unsignedInteger('headsprite')->nullable()->default(1);
            $table->unsignedInteger('bodysprite')->nullable()->default(2);
            $table->unsignedTinyInteger('male')->nullable()->default(1);
            $table->unsignedInteger('creation_date')->default(0);
            $table->string('creation_ip')->default('0.0.0.0');
            $table->unsignedInteger('login_date')->nullable()->default(0);
            $table->string('login_ip')->nullable()->default('0.0.0.0');
            $table->string('banned')->default('0')->index('banned');
            $table->integer('offences')->default(0);
            $table->string('muted')->default('0');
            $table->integer('kills')->default(0);
            $table->integer('npc_kills')->default(0);
            $table->integer('pets')->default(0);
            $table->integer('deaths')->nullable()->default(0);
            $table->unsignedTinyInteger('iron_man')->default(0);
            $table->unsignedTinyInteger('iron_man_restriction')->default(1);
            $table->unsignedTinyInteger('hc_ironman_death')->default(0);
            $table->unsignedTinyInteger('online')->nullable()->default(0);
            $table->integer('quest_points')->nullable();
            $table->unsignedInteger('bank_size')->default(192);
            $table->unsignedInteger('lastRecoveryTryId')->nullable();
            $table->integer('transfer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
