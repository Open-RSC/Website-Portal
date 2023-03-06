<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewlogs', function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->string("page");
            $table->string("game")->nullable();
            $table->text("url");
            $table->string("search_terms")->nullable();
            $table->string("ip");
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
        Schema::dropIfExists('viewlogs');
    }
}
