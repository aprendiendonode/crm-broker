<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_notes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('task_id')->nullable();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

            $table->unsignedBigInteger('add_by')->nullable();
            $table->foreign('add_by')->references('id')->on('users')->onDelete('cascade');

            $table->longText('notes_en')->nullable();
            $table->longText('notes_ar')->nullable();

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
        Schema::dropIfExists('task_notes');
    }
}
