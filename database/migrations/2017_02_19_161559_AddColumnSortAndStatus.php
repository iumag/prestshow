<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSortAndStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->boolean('status')->default(1);
            $table->integer('sort')->default(1);
        });
        Schema::table('holidays', function (Blueprint $table) {
            $table->integer('sort')->default(1);
        });
        Schema::table('hotels', function (Blueprint $table) {
            $table->integer('sort')->default(1);
        });
        Schema::table('photographers', function (Blueprint $table) {
            $table->integer('sort')->default(1);
        });
        Schema::table('transports', function (Blueprint $table) {
            $table->integer('sort')->default(1);
        });
        Schema::table('related_events', function (Blueprint $table) {
            $table->integer('sort')->default(1);
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
