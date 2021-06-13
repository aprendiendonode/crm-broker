<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodesToOpportunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {


            $table->string('phone1_code')->nullable();
            $table->string('phone2_code')->nullable();
            $table->string('phone3_code')->nullable();
            $table->string('phone4_code')->nullable();
        });
    }


    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropColumn('phone1_code');
            $table->dropColumn('phone2_code');
            $table->dropColumn('phone3_code');
            $table->dropColumn('phone4_code');
        });
    }
}
