<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();

            $table->string('company_name_en')->nullable();
            $table->string('company_name_ar')->nullable();
            $table->string('company_email')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();

            ///////////////////PRIMARY NUMBER///////////////////
            $table->string('country_code')->nullable();
            $table->string('city_code')->nullable();
            $table->string('phone')->nullable();
            ///////////////////PRIMARY NUMBER///////////////////



            ///////////////////SECONDARY NUMBER///////////////////
            $table->string('cell_code')->nullable();
            $table->string('cell')->nullable();
            ///////////////////SECONDARY NUMBER///////////////////


            $table->string('website')->nullable();



            ///////////////////FAX NUMBER///////////////////
            $table->string('fax_country_code')->nullable();
            $table->string('fax_city_code')->nullable();
            $table->string('company_fax')->nullable();
            ///////////////////FAX NUMBER///////////////////


            $table->text('address')->nullable();
            $table->string('trade_license')->nullable();
            $table->text('image')->nullable();
            $table->text('company_orn')->nullable();


            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');


            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');




            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('agencies');
    }
}