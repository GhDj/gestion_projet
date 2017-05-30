<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsommableTable extends Migration {

	public function up()
	{
		Schema::create('consommable', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nom');
			$table->integer('quantite_estime');
		});
	}

	public function down()
	{
		Schema::drop('consommable');
	}
}