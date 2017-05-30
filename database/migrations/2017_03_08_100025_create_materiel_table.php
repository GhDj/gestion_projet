<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterielTable extends Migration {

	public function up()
	{
		Schema::create('materiel', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('id_tache')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('materiel');
	}
}