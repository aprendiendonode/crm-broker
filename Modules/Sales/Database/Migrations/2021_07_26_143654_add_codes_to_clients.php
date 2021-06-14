<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodesToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {


            $table->string('phone1_code')->nullable();
            $table->string('phone2_code')->nullable();
        });
    }


    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('phone1_code');
            $table->dropColumn('phone2_code');
        });
    }
}