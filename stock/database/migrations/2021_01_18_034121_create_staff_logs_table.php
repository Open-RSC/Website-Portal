<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_logs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('staff_username', 12)->nullable();
            $table->unsignedTinyInteger('action')->nullable();
            $table->string('affected_player', 12)->nullable();
            $table->unsignedInteger('time');
            $table->unsignedInteger('staff_x')->default(0);
            $table->unsignedInteger('staff_y')->nullable()->default(0);
            $table->unsignedInteger('affected_x')->nullable()->default(0);
            $table->unsignedInteger('affected_y')->nullable()->default(0);
            $table->string('staff_ip', 15)->nullable()->default('0.0.0.0');
            $table->string('affected_ip', 15)->nullable()->default('0.0.0.0');
            $table->string('extra')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_logs');
    }
}
