<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableDaftarTamu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('daftar_tamu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('sebagai');
            $table->string('panggilan');
            $table->string('nama_perusahaan');
            $table->string('nama_admin');
            $table->string('email');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('tujuan');
            $table->date('tanggal_kunjungan');
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
    }
}
