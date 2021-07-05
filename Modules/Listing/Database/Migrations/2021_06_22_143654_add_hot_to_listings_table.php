<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHotToListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->enum('hot', ['hot', 'basic', 'signature'])->default('basic');
        });
    }


    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {

            $table->dropColumn('hot');
        });
    }
}
