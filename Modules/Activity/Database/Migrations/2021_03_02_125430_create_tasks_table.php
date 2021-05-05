<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->date('deadline')->nullable();

            $table->time('time')->nullable();

            $table->unsignedBigInteger('task_type_id')->nullable();
            $table->foreign('task_type_id')->references('id')->on('task_types')->onDelete('cascade');

            $table->unsignedBigInteger('task_status_id')->nullable();
            $table->foreign('task_status_id')->references('id')->on('task_statuses')->onDelete('cascade');

            $table->unsignedBigInteger('contact_id')->nullable();
//            $table->foreign('contact_id')->references('id')->on('')->onDelete('cascade');

            $table->unsignedBigInteger('staff_id')->nullable();
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('add_by')->nullable();
            $table->foreign('add_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');

            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');

            $table->enum('custom_reminder', ['on','off'])->default('off')->nullable();

            $table->enum('period_reminder', ['after','before'])->default('after')->nullable();

            $table->enum('type_reminder', ['days','hours'])->default('days')->nullable();

            $table->string('type_reminder_number')->nullable();

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
        Schema::dropIfExists('tasks');
    }
}
