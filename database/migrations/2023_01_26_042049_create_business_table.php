<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->string('business_id');
            $table->string('alias')->unique();
            $table->string('name');
            $table->text('image_url')->nullable();
            $table->boolean('is_closed')->nullable();
            $table->text('url')->nullable();
            $table->integer('review_count')->nullable();
            $table->smallInteger('rating')->nullable();
            $table->smallInteger('price')->nullable();
            $table->string('phone');
            $table->string('display_phone')->nullable();
            $table->float('distance')->nullable();
            $table->timestamps();

            $table->primary('business_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business');
    }
}
