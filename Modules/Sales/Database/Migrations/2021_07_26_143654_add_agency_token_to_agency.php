<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgencyTokenToAgency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agencies', function (Blueprint $table) {
            $table->string('agency_token')->nullable();
        });
    }


    public function down()
    {
        Schema::table('agencies', function (Blueprint $table) {
            $table->dropColumn('agency_token');
        });
    }
}
