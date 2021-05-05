<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeIdToListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {


            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('listing_types')->onDelete('set null');
        });
    }


    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {

            $table->dropForeign('type_id');
            $table->dropColumn('type_id');
        });
    }
}
