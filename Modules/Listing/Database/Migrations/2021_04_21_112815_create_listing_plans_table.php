<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id')->nullable();
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('set null');
            $table->text('main')->nullable();
            $table->text('watermark')->nullable();
            $table->text('title')->nullable();
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
        Schema::dropIfExists('listing_plans');
    }
}