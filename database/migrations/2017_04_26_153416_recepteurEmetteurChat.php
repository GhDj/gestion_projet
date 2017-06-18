<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecepteurEmetteurChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat', function(Blueprint $table) {
            $table->integer('emetteur')->unsigned();
            $table->integer('recepteur')->unsigned();
            $table->dropColumn(['objet','date_envoie']);




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
