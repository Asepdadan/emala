<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnTemplateEmailHeaderFooter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('template_emails', function($table) {
            //
            $table->string("header")->after("id");
            $table->string("footer")->after("header");
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
        Schema::table('template_emails', function($table) {
            //
            $table->dropColoumn("header");
            $table->dropColoumn("footer");
        });
    }
}
