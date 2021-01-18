<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenrscPetdefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openrsc_petdef', function (Blueprint $table) {
            $table->integer('primary_id', true);
            $table->integer('id')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('command')->nullable();
            $table->string('command2')->nullable();
            $table->integer('attack')->nullable();
            $table->integer('strength')->nullable();
            $table->integer('hits')->nullable();
            $table->integer('defense')->nullable();
            $table->integer('combatlvl')->default(0);
            $table->unsignedTinyInteger('isMembers')->default(0);
            $table->tinyInteger('attackable')->nullable();
            $table->tinyInteger('aggressive')->nullable();
            $table->integer('respawnTime')->nullable();
            $table->integer('sprites1')->nullable();
            $table->integer('sprites2')->nullable();
            $table->integer('sprites3')->nullable();
            $table->integer('sprites4')->nullable();
            $table->integer('sprites5')->nullable();
            $table->integer('sprites6')->nullable();
            $table->integer('sprites7')->nullable();
            $table->integer('sprites8')->nullable();
            $table->integer('sprites9')->nullable();
            $table->integer('sprites10')->nullable();
            $table->integer('sprites11')->nullable();
            $table->integer('sprites12')->nullable();
            $table->integer('hairColour')->nullable();
            $table->integer('topColour')->nullable();
            $table->integer('bottomColour')->nullable();
            $table->integer('skinColour')->nullable();
            $table->integer('camera1')->nullable();
            $table->integer('camera2')->nullable();
            $table->integer('walkModel')->nullable();
            $table->integer('combatModel')->nullable();
            $table->integer('combatSprite')->nullable();
            $table->tinyInteger('canEdit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('openrsc_petdef');
    }
}
