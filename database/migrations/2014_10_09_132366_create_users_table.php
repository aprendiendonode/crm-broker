<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('brn')->nullable();
            $table->text('description')->nullable();
            $table->string('zip')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skype')->nullable();
            $table->enum('active', [0, 1])->default(1)->nullable();
            $table->enum('type', ['owner', 'staff', 'moderator'])->default('staff')->nullable();

            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');

            ///////////////////PRIMARY NUMBER///////////////////
            $table->string('country_code')->nullable();
            $table->string('city_code')->nullable();
            $table->string('phone')->nullable();
            ///////////////////PRIMARY NUMBER///////////////////



            ///////////////////SECONDARY NUMBER///////////////////
            $table->string('cell_code')->nullable();
            $table->string('cell')->nullable();
            ///////////////////SECONDARY NUMBER///////////////////


            ///////////////////FAX NUMBER///////////////////
            $table->string('fax_country_code')->nullable();
            $table->string('fax_city_code')->nullable();
            $table->string('staff_fax')->nullable();
            ///////////////////FAX NUMBER///////////////////
            $table->text('address')->nullable();
            $table->text('image')->nullable();




            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();



            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->foreign('nationality_id')->references('id')->on('countries')->onDelete('cascade');

            $table->unsignedBigInteger('agency_id')->nullable();
            // $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');

            $table->unsignedBigInteger('team_id')->nullable();
            // $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

            // $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
