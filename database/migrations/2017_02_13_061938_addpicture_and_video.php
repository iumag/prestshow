<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddpictureAndVideo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->string('video');
        });

        Schema::table('holidays', function (Blueprint $table) {
            $table->string('video');
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->string('video');
        });

        Schema::table('photographers', function (Blueprint $table) {
            $table->string('video');
        });

        Schema::table('transports', function (Blueprint $table) {
            $table->string('video');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('video');
        });

        Schema::create('pictures', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('picture_id')->unsigned();
            $table->string('picture_type');
            $table->timestamps();
        });
    }
}
