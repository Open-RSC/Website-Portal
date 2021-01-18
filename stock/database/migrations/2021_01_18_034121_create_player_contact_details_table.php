<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_contact_details', function (Blueprint $table) {
            $table->unsignedInteger('playerID')->primary();
            $table->string('username', 12)->default('');
            $table->string('fullname', 100)->nullable()->default('');
            $table->string('zipCode', 10)->nullable()->default('');
            $table->string('country', 100)->nullable()->default('');
            $table->string('email')->nullable();
            $table->unsignedInteger('date_modified')->default(0);
            $table->string('ip')->nullable()->default('0.0.0.0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_contact_details');
    }
}
