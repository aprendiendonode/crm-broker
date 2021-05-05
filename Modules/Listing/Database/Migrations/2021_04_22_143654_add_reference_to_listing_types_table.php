<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferenceToListingTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listing_types', function (Blueprint $table) {

            $table->string('reference')->nullable();
        });
    }


    public function down()
    {
        Schema::table('listing_types', function (Blueprint $table) {
            $table->dropColumn('reference');
        });
    }
}
