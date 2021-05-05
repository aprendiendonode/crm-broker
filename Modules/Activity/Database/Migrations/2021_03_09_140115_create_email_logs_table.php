<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->text('contacts')->nullable();
            $table->text('email_addresses')->nullable();
            $table->text('BCC')->nullable();
            $table->text('subject')->nullable();
            $table->longText('email_content')->nullable();
            $table->string('attach_file')->nullable();

            $table->unsignedBigInteger('add_by')->nullable();
            $table->foreign('add_by')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_logs');
    }
}
