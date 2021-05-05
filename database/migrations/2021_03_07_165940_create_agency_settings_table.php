<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_settings', function (Blueprint $table) {
            $table->id();

            $table->enum('quick_show_number_of_bedrooms', ['yes', 'no'])->default('yes')->nullable();
            $table->enum('quick_show_number_of_parkings', ['yes', 'no'])->default('yes')->nullable();
            $table->enum('quick_show_number_of_photos', ['yes', 'no'])->default('yes')->nullable();
            $table->enum('quick_show_number_of_videos', ['yes', 'no'])->default('yes')->nullable();



            $table->enum('listings_landlord_should_be_mandatory', ['yes', 'no'])->default('yes')->nullable();
            $table->enum('listings_source_should_be_mandatory', ['yes', 'no'])->default('yes')->nullable();
            $table->enum('listings_reference_should_contain_staff_initial', ['yes', 'no'])->default('no')->nullable();
            $table->enum('listings_show_building_name', ['yes', 'no'])->default('no')->nullable();


            $table->enum('leads_can_assign_multiple_agents', ['yes', 'no'])->default('no')->nullable();
            $table->enum('leads_source_should_be_mandatory', ['yes', 'no'])->default('no')->nullable();
            $table->enum('leads_contacts_should_be_mandatory', ['yes', 'no'])->default('no')->nullable();
            $table->enum('leads_area_min_should_be_mandatory', ['yes', 'no'])->default('no')->nullable();
            $table->enum('leads_budget_max_should_be_mandatory', ['yes', 'no'])->default('no')->nullable();


            $table->enum('contacts_per_page', [20, 50, 100])->default(20)->nullable();

            $table->enum('company_profile_primary_number_should_be_mandatory', ['yes', 'no'])->default('no')->nullable();

            $table->enum('lsm_overall_status', ['activated', 'deactivated'])->default('activated')->nullable();
            $table->enum('lsm_share_status', ['private', 'shared'])->default('private')->nullable();
            $table->enum('lsm_listings_per_page', [20, 50, 100])->default(20)->nullable();




            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');



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
        Schema::dropIfExists('agency_portals');
    }
}