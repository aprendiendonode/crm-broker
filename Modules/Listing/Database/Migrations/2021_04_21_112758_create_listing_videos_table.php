<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id')->nullable();
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('set null');
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->text('host')->nullable();
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
        Schema::dropIfExists('listing_videos');
    }
}
