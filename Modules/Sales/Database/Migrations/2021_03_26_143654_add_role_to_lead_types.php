<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToLeadTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_types', function (Blueprint $table) {


            $table->string('role')->nullable();
        });
    }


    public function down()
    {
        Schema::table('lead_types', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}