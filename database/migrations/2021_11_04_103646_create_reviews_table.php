<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->uuid('user');
            $table->foreign('user')->references('id')->on('users');
            $table->uuid('object');
            $table->foreign('object')->references('id')->on('users');
            $table->string('title');
            $table->text('review')->nullable();
            $table->integer('ratting');
            $table->primary(['id', 'user', 'object']);
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
        Schema::dropIfExists('reviews');
    }
}
