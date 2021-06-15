<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoordinatesToLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {


            $table->string('lat_loc')->nullable();
            $table->string('lng_loc')->nullable();
        });
    }


    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('lat_loc');
            $table->dropColumn('lng_loc');
        });
    }
}