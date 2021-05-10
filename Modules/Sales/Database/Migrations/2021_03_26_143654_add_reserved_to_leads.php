<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReservedToLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {


            $table->string('reserved_1')->nullable();
            $table->string('reserved_2')->nullable();
            $table->string('reserved_3')->nullable();
            $table->string('reserved_4')->nullable();
            $table->string('reserved_5')->nullable();
            $table->string('reserved_6')->nullable();
            $table->string('reserved_7')->nullable();
            $table->string('reserved_8')->nullable();
            $table->string('reserved_9')->nullable();
            $table->string('reserved_10')->nullable();
            $table->string('reserved_11')->nullable();
            $table->string('reserved_12')->nullable();
            $table->string('reserved_13')->nullable();
            $table->string('reserved_14')->nullable();
            $table->string('reserved_15')->nullable();
            $table->string('reserved_16')->nullable();
            $table->string('reserved_17')->nullable();
        });
    }


    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('reserved_1');
            $table->dropColumn('reserved_2');
            $table->dropColumn('reserved_3');
            $table->dropColumn('reserved_4');
            $table->dropColumn('reserved_5');
            $table->dropColumn('reserved_6');
            $table->dropColumn('reserved_7');
            $table->dropColumn('reserved_8');
            $table->dropColumn('reserved_9');
            $table->dropColumn('reserved_10');
            $table->dropColumn('reserved_11');
            $table->dropColumn('reserved_12');
            $table->dropColumn('reserved_13');
            $table->dropColumn('reserved_14');
            $table->dropColumn('reserved_15');
            $table->dropColumn('reserved_16');
            $table->dropColumn('reserved_17');
        });
    }
}