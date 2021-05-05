<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();

            //start opportunity columns
            $table->string('probability_of_winning')->nullable();

            $table->enum('status', ['in_progress', 'meeting', 'successful', 'unsuccessful'])->default('in_progress')->nullable();
            $table->enum('stage', ['pending', 'lost', 'won'])->default('pending')->nullable();


            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');


            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');


            $table->unsignedBigInteger('converted_by')->nullable();
            $table->foreign('converted_by')->references('id')->on('users')->onDelete('cascade');
            // From Lead


            $table->string('salutation')->nullable();

            $table->unsignedBigInteger('source_id')->nullable();
            $table->foreign('source_id')->references('id')->on('lead_sources')->onDelete('cascade');

            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('lead_types')->onDelete('cascade');


            $table->unsignedBigInteger('qualification_id')->nullable();
            $table->foreign('qualification_id')->references('id')->on('lead_qualifications')->onDelete('cascade');


            $table->unsignedBigInteger('communication_id')->nullable();
            $table->foreign('communication_id')->references('id')->on('lead_communications')->onDelete('cascade');

            $table->unsignedBigInteger('priority_id')->nullable();
            $table->foreign('priority_id')->references('id')->on('lead_priorities')->onDelete('cascade');

            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->string('po_box')->nullable();
            $table->string('passport')->nullable();
            $table->string('passport_expiration_date')->nullable();
            $table->string('first_name')->nullable();
            $table->string('sec_name')->nullable();
            $table->string('full_name')->nullable();

            $table->string('partner_name')->nullable();

            $table->string('date_of_birth')->nullable();

            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();

            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id')->references('id')->on('countries')->onDelete('cascade');

            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');


            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('phone4')->nullable();
            $table->string('landline')->nullable();

            // $table->string('zip')->nullable();
            $table->string('fax')->nullable();


            $table->string('developer')->nullable();
            $table->text('community')->nullable();
            $table->text('building_name')->nullable();
            $table->enum('property_purpose', ['rent', 'buy'])->default('rent')->nullable();

            $table->string('property_no')->nullable();
            $table->string('property_reference')->nullable();



            $table->unsignedBigInteger('property_id')->nullable();
            $table->foreign('property_id')->references('id')->on('lead_property')->onDelete('cascade');



            $table->string('size_sqft')->nullable();
            $table->string('size_sqm')->nullable();


            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('parkings')->nullable();



            $table->string('skype')->nullable();

            $table->string('country_code')->nullable();
            $table->string('country_flag')->nullable();
            $table->string('timezone')->nullable();
            $table->string('country')->nullable();


            $table->text('address')->nullable();
            $table->string('other')->nullable();


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
        Schema::dropIfExists('opportunities');
    }
}