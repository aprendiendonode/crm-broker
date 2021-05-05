<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailNotifyRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_notify_reminders', function (Blueprint $table) {
            $table->id();

            $table->enum('category',['general_reminder','property_viewing','call','send_documents','collect_documents','meeting','email','payment_collection','cheque_submission'])->default('general_reminder')->nullable();
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
        Schema::dropIfExists('email_notify_reminders');
    }
}
