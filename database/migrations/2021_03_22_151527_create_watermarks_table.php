<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatermarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watermarks', function (Blueprint $table) {
            $table->id();

            $table->text('image')->nullable();
            $table->text('name')->nullable();

            $table->integer('transparent')->default(50)->nullable();

            $table->enum('active',['yes','no'])->default('yes')->nullable();
            $table->enum('update_listing',['yes','no'])->default('yes')->nullable();
            $table->enum('current',['yes','no'])->default('yes')->nullable();

            $table->enum('position',['top-left','top','top-right','left','center','right','bottom-left','bottom','bottom-right'])->default('top-left')->nullable();
//            $table->enum('position',['left_top','mid_top','right_top','left_center','mid_center','right_center','left_bottom','mid_bottom','right_bottom'])->default('mid_center')->nullable();


            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');

            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');

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
        Schema::dropIfExists('watermarks');
    }
}
