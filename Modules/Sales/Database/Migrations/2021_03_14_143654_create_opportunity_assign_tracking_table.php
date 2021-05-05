<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunityAssignTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_assign_tracking', function (Blueprint $table) {
            $table->id();

            //start opportunity columns


            $table->unsignedBigInteger('opportunity_id')->nullable();
            $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('cascade');

            // $table->unsignedBigInteger('lead_id')->nullable();
            // $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');

            $table->text('reason_change_assign')->nullable();

            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');


            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');


            $table->unsignedBigInteger('assigned_by')->nullable();
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('cascade');
            // From Lead

            $table->text('assigned_to')->nullable();
            $table->string('start_assign')->nullable();
            $table->string('end_assign')->nullable();
            $table->enum('status', ['on', 'off'])->default('on');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunity_assign_tracking');
    }
}
