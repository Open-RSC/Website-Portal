<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRscstatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //As the scale of this table grows, we may want to add an index each for some columns,
        //likely timestamp fields. We could order by indexed columns like ID for best performance,
        //especially since primary key ID is automatically indexed.
        Schema::create('rscstats', function (Blueprint $table) {
            $table->id();
            $table->string('server');
            $table->string('key'); //The key will be servername_stats_date_hour like cabbage_stats_2023-01-31_11PM to prevent re-creating the hourly stats.
            $table->integer('online');
            $table->integer('registrations');
            $table->integer('createdToday');
            $table->integer('logins48');
            $table->integer('uniquePlayers');
            $table->integer('totalPlayers');
            $table->unsignedBigInteger('sumgold');
            $table->integer('gold1m');
            $table->integer('gold5m');
            $table->integer('gold10m');
            $table->integer('pumpkin');
            $table->integer('cracker');
            $table->integer('redphat');
            $table->integer('yellowphat');
            $table->integer('bluephat');
            $table->integer('greenphat');
            $table->integer('pinkphat');
            $table->integer('whitephat');
            $table->integer('easteregg');
            $table->integer('redmask');
            $table->integer('bluemask');
            $table->integer('greenmask');
            $table->integer('santahat');
            $table->integer('scythe');
            $table->integer('dsq');
            $table->integer('dmed');
            $table->integer('dammy');
            $table->integer('dbattle');
            $table->integer('dlong');
            $table->integer('rune2h');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rscstats');
    }
}
