<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyPortalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_portals', function (Blueprint $table) {
            $table->id();

            $table->string('last_run')->nullable();
            $table->enum('status',['on','off'])->default('on')->nullable();


            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');


            $table->unsignedBigInteger('template_id')->nullable();
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');


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
