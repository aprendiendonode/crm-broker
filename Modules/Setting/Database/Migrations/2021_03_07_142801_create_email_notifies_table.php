<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_notifies', function (Blueprint $table) {
            $table->id();

            $table->boolean('listing_assigned')->default(0)->nullable();
            $table->boolean('lead_assigned')->default(0)->nullable();
            $table->boolean('listing_approval')->default(0)->nullable();
            $table->boolean('task_assigned')->default(0)->nullable();
            $table->boolean('listing_approved')->default(0)->nullable();
            $table->boolean('listing_rejected')->default(0)->nullable();
            $table->boolean('lsm_lead')->default(0)->nullable();
            $table->boolean('email_lead')->default(0)->nullable();

            $table->boolean('task_reminder')->default(0)->nullable();
            $table->boolean('tenancy_expiry')->default(0)->nullable();

            $table->string('email_cc')->nullable();
            $table->string('email_bcc')->nullable();


            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');

            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');



            $table->softDeletes();
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
        Schema::dropIfExists('email_notifies');
    }
}
