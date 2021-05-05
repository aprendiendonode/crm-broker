<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddListingIdToListingFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listing_types', function (Blueprint $table) {

            $table->enum('type', ['commercial', 'residential'])->default('residential');
        });
    }


    public function down()
    {
        Schema::table('listing_types', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
