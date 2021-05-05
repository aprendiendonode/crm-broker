<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');


            $table->enum('purpose', ['rent', 'sale'])->default('sale');
            $table->text('location')->nullable();
            $table->string('city')->nullable();
            $table->text('community')->nullable();
            $table->string('state')->nullable();

            $table->string('unit_no')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('street_no')->nullable();

            $table->longText('view_ids')->nullable();
            $table->longText('features')->nullable();
            // $table->foreign('view_id')->references('id')->on('listing_views')->onDelete('set null');


            $table->enum('rent_frequency', ['yearly', 'monthly', 'weekly', 'daily'])->nullable()->default('monthly');

            $table->string('comission_percent')->nullable();
            $table->string('comission_value')->nullable();
            $table->string('price')->nullable();

            $table->enum('never_lived_in', ['yes', 'no'])->default('no');
            $table->enum('featured_on_company_website', ['yes', 'no'])->default('no');
            $table->enum('exclusive_rights', ['yes', 'no'])->default('no');

            $table->string('beds')->nullable();
            $table->string('baths')->nullable();
            $table->string('parkings')->nullable();
            $table->string('year_built')->nullable();


            $table->unsignedBigInteger('developer_id')->nullable();
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('set null');
            //covered area
            $table->string('plot_area')->nullable();
            $table->string('area')->nullable();

            $table->string('deposite_percent')->nullable();
            $table->string('deposite_value')->nullable();


            $table->unsignedBigInteger('listing_rent_cheque_id')->nullable();
            $table->foreign('listing_rent_cheque_id')->references('id')->on('listing_rent_cheques')->onDelete('set null');


            //extra_information
            $table->text('key_location')->nullable();
            $table->string('govfield1')->nullable();
            $table->string('govfield2')->nullable();
            $table->string('yearly_service_charges')->nullable();
            $table->string('monthly_cooling_charges')->nullable();
            $table->string('monthly_cooling_provider')->nullable();


            $table->string('title')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();


            $table->longText('portals')->nullable();

            $table->enum('furnished', ['yes', 'no'])->default('no');
            $table->enum('lsm', ['shared', 'private'])->default('private');
            $table->string('permit_no')->nullable();

            $table->string('rera_property_no_status')->nullable();
            $table->string('rera_property_no_log')->nullable();

            $table->string('rera_property_no')->nullable();
            $table->string('rera_property_expiry_date')->nullable();
            $table->enum('rented', ['yes', 'no'])->nullable();

            $table->string('tenancy_contract_start_date')->nullable();
            $table->string('tenancy_contract_end_date')->nullable();

            $table->unsignedBigInteger('landlord_id')->nullable();
            $table->foreign('landlord_id')->references('id')->on('clients')->onDelete('set null');

            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->foreign('tenant_id')->references('id')->on('clients')->onDelete('set null');

            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('source_id')->nullable();
            $table->foreign('source_id')->references('id')->on('lead_sources')->onDelete('set null');

            $table->enum('status', ['draft', 'live', 'archive', 'review'])->default('draft');
            $table->text('Note')->nullable();



























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
        Schema::dropIfExists('listings');
    }
}