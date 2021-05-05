<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRejectReasonToOpportunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {

            $table->longText('reject_reason')->nullable();
        });
    }


    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropColumn('reject_reason');
        });
    }
}
