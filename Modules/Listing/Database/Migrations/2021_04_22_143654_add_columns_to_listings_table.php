<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {

            $table->string('ref_id')->nullable();
            $table->string('listing_ref')->nullable();
        });
    }


    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn('ref_id');
            $table->dropColumn('listing_ref');
        });
    }
}
