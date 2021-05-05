<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeForignOnClientQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_questions', function (Blueprint $table) {
            $table->dropForeign('client_questions_client_id_foreign');
            $table->dropColumn('client_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_questions', function (Blueprint $table) {
            //
        });
    }
}
