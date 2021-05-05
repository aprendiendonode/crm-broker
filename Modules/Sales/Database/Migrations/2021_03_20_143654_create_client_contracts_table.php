<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_contracts', function (Blueprint $table) {
            $table->id();

            //start opportunity columns


            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');


            $table->unsignedBigInteger('converted_by')->nullable();
            $table->foreign('converted_by')->references('id')->on('users')->onDelete('cascade');

            $table->enum('status', ['pending', 'accepted'])->default('pending')->nullable();
            $table->enum('contract_type', ['rent', 'buy'])->default('rent')->nullable();

            $table->string('customer_name')->nullable();
            $table->string('customer_national_id')->nullable();
            $table->text('customer_address')->nullable();


            $table->string('landlord_name')->nullable();
            $table->string('landlord_national_id')->nullable();
            $table->text('landlord_address')->nullable();

            $table->text('address')->nullable();

            $table->text('notes')->nullable();

            $table->string('start_date')->nullable();

            $table->string('end_date')->nullable();
            $table->string('amount')->nullable();


            $table->enum('has_recurring', ['yes', 'no'])->default('no')->nullable();
            $table->string('recurring_number')->nullable();


            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');

            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_contracts');
    }
}
