<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTransactionTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_transaction_type', function (Blueprint $table) {
            $table->id();
            $table->string('business_id');
            $table->integer('transaction_type_id');
            $table->timestamps();

            $table->foreign('business_id')->references('business_id')->on('business');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_transaction_type');
    }
}
