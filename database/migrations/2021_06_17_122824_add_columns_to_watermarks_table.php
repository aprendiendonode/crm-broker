<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToWatermarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('watermarks', function (Blueprint $table) {
            $table->text('main_image')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('watermarks', function (Blueprint $table) {
            $table->dropColumn('main_image');
            $table->dropColumn('width');
            $table->dropColumn('height');
        });
    }
}
