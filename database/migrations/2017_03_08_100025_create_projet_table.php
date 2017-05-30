<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjetTable extends Migration {

	public function up()
	{
		Schema::create('projet', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nomProjet');
			$table->string('description');
			$table->decimal('budget');
			$table->date('date_debut');
			$table->integer('date_fin');
			$table->string('service');
			$table->string('lieu');
			$table->integer('id_user')->unsigned();
			$table->integer('id_service')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('projet');
	}
}