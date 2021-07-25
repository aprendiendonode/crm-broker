<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSymbolsToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('phone1_symbol')->nullable();
            $table->string('phone2_symbol')->nullable();
        });
    }


    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('phone1_symbol');
            $table->dropColumn('phone2_symbol');
        });
    }
}
