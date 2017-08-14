<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeluhanPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluhan_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('keluhan_id')->unsigned();
            $table->string('file');
            $table->timestamps();
            $table->foreign('keluhan_id')->references('id')->on('keluhans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluhan_photos');
    }
}
