<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnTentangKami extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tentang_kamis', function ( $table) {
            $table->string('judul1')->after('isi');
            $table->string('isi1');
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
        Schema::table('tentang_kamis', function ( $table) {
            $table->dropColoumn('judul1');
            $table->dropColoumn('isi1');
        });
    }
}
