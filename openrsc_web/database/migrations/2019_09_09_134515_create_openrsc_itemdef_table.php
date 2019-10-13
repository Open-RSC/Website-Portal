<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenrscItemdefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openrsc_itemdef', function (Blueprint $table) {
            $table->increments('id')->unique();
			$table->primary('id');
			$table->integer('bankNoteID');
			$table->integer('originalItemID');
			$table->string('name', 255);
			$table->index('name');
			$table->string('description', 255);
			$table->string('command', 255);
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
        });
    }
}
