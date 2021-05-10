<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQualificationToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            // to fix the filter in the search center and nothing else
            $table->bigInteger('qualification_id')->nullable();
            $table->bigInteger('priority_id')->nullable();
            $table->bigInteger('assigned_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {

            $table->dropColumn('qualification_id');
            $table->dropColumn('priority_id');
            $table->dropColumn('assigned_to');
        });
    }
}
