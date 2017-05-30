<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceTable extends Migration {

	public function up()
	{
		Schema::create('service', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nom_service');
			$table->string('chef_service');
		});
	}

	public function down()
	{
		Schema::drop('service');
	}
}