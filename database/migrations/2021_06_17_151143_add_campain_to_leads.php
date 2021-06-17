<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampainToLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('campaign_id')->nullable();
            $table->string('campaign_name')->nullable();
            $table->string('campaign_lead_id')->nullable();
            $table->string('campaign_form_id')->nullable();
            $table->string('campaign_ad_id')->nullable();
            $table->string('campaign_ad_name')->nullable();
            $table->string('campaign_adset_name')->nullable();
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
            $table->dropColumn('campaign_id');
            $table->dropColumn('campaign_name');
            $table->dropColumn('campaign_lead_id');
            $table->dropColumn('campaign_form_id');
            $table->dropColumn('campaign_ad_id');
            $table->dropColumn('campaign_ad_name');
            $table->dropColumn('campaign_adset_name');
        });
    }
}
