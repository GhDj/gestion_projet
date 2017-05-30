<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReunionTable extends Migration {

	public function up()
	{
		Schema::create('reunion', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('designation');
			$table->integer('nbr_present');
			$table->integer('code_afaire');
			$table->string('type');
			$table->integer('id_projet')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('reunion');
	}
}