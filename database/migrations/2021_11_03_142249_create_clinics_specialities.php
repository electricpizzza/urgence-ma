<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsSpecialities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics_specialities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('speciality');
            $table->foreign('speciality')->references('id')->on('specialities');
            $table->unsignedBigInteger('clinic');
            $table->foreign('clinic')->references('id')->on('clinics');
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
        Schema::dropIfExists('clinics_specialities');
    }
}
