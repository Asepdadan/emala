<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustombackendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custombackends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto');
            $table->string('header');
            $table->string('footer_kiri');
            $table->string('versi')->coment("footer kanan untuk versi");
            $table->integer("status");
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
        Schema::dropIfExists('custombackends');
    }
}
