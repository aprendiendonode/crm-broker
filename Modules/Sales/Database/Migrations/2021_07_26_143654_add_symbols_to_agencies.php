<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSymbolsToAgencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agencies', function (Blueprint $table) {
            $table->string('country_symbol')->nullable();
            $table->string('cell_symbol')->nullable();
        });
    }


    public function down()
    {
        Schema::table('agencies', function (Blueprint $table) {
            $table->dropColumn('country_symbol');
            $table->dropColumn('cell_symbol');
        });
    }
}
