<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoordinatesToOpportunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {


            $table->string('loc_lat')->nullable();
            $table->string('loc_lng')->nullable();
        });
    }


    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropColumn('loc_lat');
            $table->dropColumn('loc_lng');
        });
    }
}