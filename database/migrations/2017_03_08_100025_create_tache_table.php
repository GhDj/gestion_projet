<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTacheTable extends Migration {

	public function up()
	{
		Schema::create('tache', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nomTache');
			$table->string('description_tache');
			$table->string('duree');
			$table->string('statut_tache');
			$table->datetime('date_debut_tache');
			$table->string('date_fin_tache');
			$table->integer('id_module')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('tache');
	}
}