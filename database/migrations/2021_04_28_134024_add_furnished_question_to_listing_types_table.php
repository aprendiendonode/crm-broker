<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFurnishedQuestionToListingTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listing_types', function (Blueprint $table) {

            $table->enum('furnished_question', ['yes', 'no'])->nullable()->default('no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listing_types', function (Blueprint $table) {

            $table->dropColumn('furnished_question');
        });
    }
}