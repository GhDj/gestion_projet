<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesTable extends Migration {

	public function up()
	{
		Schema::create('modules', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('designation');
			$table->integer('nbr_points');
			$table->string('avancement');
			$table->string('statut_module');
			$table->integer('id_projet')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('modules');
	}
}