<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultModeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('default_mode', ['dark', 'light'])->default('light');
            $table->enum('default_width', ['fluid', 'boxed'])->default('fluid');
            $table->enum('default_position', ['fixed', 'scrollable'])->default('fixed');
            $table->enum('default_sidebar_color', ['light', 'dark', 'brand', 'gradient'])->default('light');
            $table->enum('default_sidebar_size', ['default', 'compact', 'condensed'])->default('default');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('default_mode');
            $table->dropColumn('default_width');
            $table->dropColumn('default_position');
            $table->dropColumn('default_sidebar_color');
            $table->dropColumn('default_sidebar_size');
        });
    }
}
