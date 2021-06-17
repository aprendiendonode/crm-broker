<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessTokenToBusinesses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->string('business_token')->nullable();
        });
    }


    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropColumn('business_token');
        });
    }
}
