<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingChequesCalculatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_cheque_calculator', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('value')->nullable();
            $table->string('percent')->nullable();
            $table->unsignedBigInteger('listing_id')->nullable();
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('set null');
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
        Schema::dropIfExists('listing_cheque_calculator');
    }
}
