<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGenericLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generic_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message')/*->index('message')*/;
            $table->unsignedInteger('time')->index('time');
        });

        DB::unprepared('ALTER TABLE generic_logs ADD UNIQUE key message (message(255))');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generic_logs');
    }
}
