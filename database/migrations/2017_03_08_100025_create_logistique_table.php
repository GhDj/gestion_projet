<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogistiqueTable extends Migration {

	public function up()
	{
		Schema::create('logistique', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('description_logistique');
			$table->integer('id_tache')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('logistique');
	}
}