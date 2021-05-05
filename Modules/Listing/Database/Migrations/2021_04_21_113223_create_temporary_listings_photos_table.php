<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporaryListingsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_listings_photos', function (Blueprint $table) {
            $table->id();
            $table->text('folder')->nullable();
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
        Schema::dropIfExists('temporary_listings_photos');
    }
}