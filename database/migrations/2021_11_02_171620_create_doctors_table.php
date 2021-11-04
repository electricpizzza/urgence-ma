<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->text('bio');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('tel1');
            $table->string('tel2')->nullable();
            $table->unsignedBigInteger('speciality');
            $table->foreign('speciality')->references('id')->on('specialities');
            $table->string('profile')->default('');
            $table->string('banner')->default('');
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
        Schema::dropIfExists('doctors');
    }
}
