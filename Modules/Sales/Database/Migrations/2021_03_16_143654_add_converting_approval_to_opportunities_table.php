<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConvertingApprovalToOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {

            $table->string('converting_approval')->nullable();
        });
    }


    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropColumn('converting_approval');
        });
    }
}
