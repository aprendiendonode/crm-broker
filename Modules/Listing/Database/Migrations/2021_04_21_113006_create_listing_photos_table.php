<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id')->nullable();
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('set null');
            $table->text('main')->nullable();
            $table->text('watermark')->nullable();
            $table->enum('active', ['main', 'watermark'])->nullable();
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
        Schema::dropIfExists('listing_photos');
    }
}