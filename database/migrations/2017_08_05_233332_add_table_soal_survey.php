<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableSoalSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('soal_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('soal');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('pilihan_survey', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pilihan');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('penilaian_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_soal")->unsigned();
            $table->integer("id_pilihan")->unsigned();
            $table->integer('status');
            $table->foreign('id_soal')->references('id')->on('soal_surveys')->onUpdate('cascade');
            $table->foreign('id_pilihan')->references('id')->on('pilihan_survey')->onUpdate('cascade');
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
        //
        Schema::dropIfExists('soal_surveys');
        Schema::dropIfExists('pilihan_survey');
        Schema::dropIfExists('penilaian_surveys');
    }
}

