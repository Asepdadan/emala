<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePelatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pelatihan')->unsigned();
            $table->string('nama');
            $table->string('nama_perusahaan');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('email');
            $table->date('tanggal_pelatihan');
            $table->timestamps();
        });

        Schema::create('tipe_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipe_pelatihan');
            $table->timestamps();
        });

        Schema::create('waktu_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->text('keterangan');
            $table->date('tanggal_pelatihan');
            $table->timestamps();
        });

        Schema::table('pelatihan',function ($table){
            $table->foreign('id_pelatihan')->references('id')->on('tipe_pelatihan')->onUpdate('cascade');
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
        Schema::dropIfExists('pelatihan');
        Schema::dropIfExists('tipe_pelatihan');
        Schema::dropIfExists('waktu_pelatihan');
    }
}
