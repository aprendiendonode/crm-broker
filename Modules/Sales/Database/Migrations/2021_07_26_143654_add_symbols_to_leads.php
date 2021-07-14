<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSymbolsToLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {


            $table->string('phone1_symbol')->nullable();
            $table->string('phone2_symbol')->nullable();
            $table->string('phone3_symbol')->nullable();
            $table->string('phone4_symbol')->nullable();
        });
    }


    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('phone1_symbol');
            $table->dropColumn('phone2_symbol');
            $table->dropColumn('phone3_symbol');
            $table->dropColumn('phone4_symbol');
        });
    }
}
