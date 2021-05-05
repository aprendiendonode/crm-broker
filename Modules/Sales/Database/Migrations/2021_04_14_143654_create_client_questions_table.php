<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_questions', function (Blueprint $table) {
            $table->id();

            //start client columns


            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('opportunities')->onDelete('cascade');


            $table->longText('question')->nullable();
            $table->longText('answer')->nullable();
            $table->enum('answered', ['yes', 'no'])->default('no');

            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');

            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('answered_by')->nullable();
            $table->foreign('answered_by')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('client_questions');
    }
}