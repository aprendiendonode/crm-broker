<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOpportunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {


            $table->unsignedBigInteger('rejected_by')->nullable();
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('reject_date')->nullable();

            $table->unsignedBigInteger('hold_by')->nullable();
            $table->foreign('hold_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('hold_date')->nullable();


            $table->unsignedBigInteger('submit_for_approve_by')->nullable();
            $table->foreign('submit_for_approve_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('submit_for_approve_date')->nullable();
        });
    }


    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropColumn('rejected_by');
            $table->dropColumn('hold_by');
            $table->dropColumn('submit_for_approve_by');

            $table->dropColumn('reject_date');
            $table->dropColumn('hold_date');
            $table->dropColumn('submit_for_approve_date');
        });
    }
}