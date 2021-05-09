<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_notes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('listing_id')->nullable();
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');

            $table->unsignedBigInteger('add_by')->nullable();
            $table->foreign('add_by')->references('id')->on('users')->onDelete('cascade');

            $table->longText('notes_en')->nullable();
            $table->longText('notes_ar')->nullable();

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
        Schema::dropIfExists('listing_notes');
    }
}