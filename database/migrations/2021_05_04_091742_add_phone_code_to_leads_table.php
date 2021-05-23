<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneCodeToLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('phone1_code')->nullable();
            $table->string('phone2_code')->nullable();
            $table->string('phone3_code')->nullable();
            $table->string('phone4_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('phone1_code');
            $table->dropColumn('phone2_code');
            $table->dropColumn('phone3_code');
            $table->dropColumn('phone4_code');
        });
    }
}
