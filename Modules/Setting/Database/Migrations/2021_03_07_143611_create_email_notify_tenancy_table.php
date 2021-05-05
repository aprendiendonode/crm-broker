<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailNotifyTenancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_notify_tenancy', function (Blueprint $table) {
            $table->id();

            $table->enum('type',['after','before'])->default('before')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();

            $table->unsignedBigInteger('email_notify_id')->nullable();
            $table->foreign('email_notify_id')->references('id')->on('email_notifies')->onDelete('cascade');


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
        Schema::dropIfExists('email_notify_tenancy');
    }
}
