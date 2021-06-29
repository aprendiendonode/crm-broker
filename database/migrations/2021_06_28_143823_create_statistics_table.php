<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('data_source')->nullable();
            $table->string('transaction_type')->nullable();
            $table->enum('type',['sale','rent'])->nullable();
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->string('country_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('area_code')->nullable();
            $table->string('community_id')->nullable();
            $table->string('property_type')->nullable();
            $table->string('purpose')->nullable();
            $table->string('subcommunity_id')->nullable();
            $table->string('property_number')->nullable();
            $table->string('additional_details')->nullable();
            $table->string('size_sqm')->nullable();
            $table->string('price_sqm')->nullable();
            $table->string('total_worth')->nullable();
            $table->string('size_sqft')->nullable();
            $table->string('price_sqft')->nullable();


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
        Schema::dropIfExists('statistics');
    }
}
