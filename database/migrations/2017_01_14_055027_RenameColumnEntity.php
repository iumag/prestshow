<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->renameColumn('city', 'name');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('event', 'name');
        });
        Schema::table('hotels', function (Blueprint $table) {
            $table->renameColumn('hotel', 'name');
        });
        Schema::table('photographers', function (Blueprint $table) {
            $table->renameColumn('photographer', 'name');
        });
        Schema::table('transports', function (Blueprint $table) {
            $table->renameColumn('transport', 'name');
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
