<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {


            $table->string('table_name')->nullable();
        });
    }


    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('table_name');
        });
    }
}
