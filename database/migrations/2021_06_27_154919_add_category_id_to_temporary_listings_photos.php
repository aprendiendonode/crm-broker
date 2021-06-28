<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToTemporaryListingsPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temporary_listings_photos', function (Blueprint $table) {
            $table->unsignedBigInteger('listing_category_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temporary_listings_photos', function (Blueprint $table) {
            $table->dropColumn('listing_category_id');
        });
    }
}
