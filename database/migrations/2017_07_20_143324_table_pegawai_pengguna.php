<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePegawaiPengguna extends Migration
{
   
    public function up()
    {
        //
         Schema::create('pegawai_pengguna', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nip');
            $table->string('userId')->unique();
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('golongan');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('no_sk');
            $table->date('masa_berlaku');
            $table->string('file_sk');
            $table->timestamps();
        });
         

    }

   
    public function down()
    {
        //
        Schema::dropIfExists('pegawai_pengguna');
    }
}
