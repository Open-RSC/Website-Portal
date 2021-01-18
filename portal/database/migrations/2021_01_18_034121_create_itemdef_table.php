<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemdefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemdef', function (Blueprint $table) {
            $table->integer('id')->index('id_2');
            $table->string('name')->index('name');
            $table->string('description');
            $table->string('command');
            $table->tinyInteger('isFemaleOnly');
            $table->tinyInteger('isMembersOnly');
            $table->tinyInteger('isStackable');
            $table->tinyInteger('isUntradable');
            $table->tinyInteger('isWearable');
            $table->integer('appearanceID');
            $table->integer('wearableID');
            $table->integer('wearSlot');
            $table->integer('requiredLevel');
            $table->integer('requiredSkillID');
            $table->integer('armourBonus');
            $table->integer('weaponAimBonus');
            $table->integer('weaponPowerBonus');
            $table->integer('magicBonus');
            $table->integer('prayerBonus');
            $table->integer('basePrice');
            $table->tinyInteger('isNoteable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemdef');
    }
}
