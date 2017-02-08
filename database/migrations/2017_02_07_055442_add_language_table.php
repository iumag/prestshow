<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
        });

        Schema::table('holidays', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
        });

        Schema::table('photographers', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
        });

        Schema::table('transports', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
        });

        Schema::create('city_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description');

            $table->unique(['city_id','locale']);
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

        });

        Schema::create('holiday_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('holiday_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description');

            $table->unique(['holiday_id','locale']);
            $table->foreign('holiday_id')->references('id')->on('holidays')->onDelete('cascade');

        });

        Schema::create('hotel_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description');

            $table->unique(['hotel_id','locale']);
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');

        });

        Schema::create('photographer_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photographer_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description');

            $table->unique(['photographer_id','locale']);
            $table->foreign('photographer_id')->references('id')->on('photographers')->onDelete('cascade');

        });

        Schema::create('transport_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description');

            $table->unique(['transport_id','locale']);
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
