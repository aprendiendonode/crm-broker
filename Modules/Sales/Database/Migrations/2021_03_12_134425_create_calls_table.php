<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();

            $table->string('contact_date')->nullable();
            $table->string('contact_time')->nullable();
            $table->string('next_action_date')->nullable();
            $table->string('next_action_time')->nullable();
            $table->text('note')->nullable();



            $table->unsignedBigInteger('made_by')->nullable();
            $table->foreign('made_by')->references('id')->on('users')->onDelete('cascade');

            $table->string('module')->nullable();

            $table->bigInteger('module_id')->nullable();


            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');


            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');

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
        Schema::dropIfExists('calls');
    }
}
