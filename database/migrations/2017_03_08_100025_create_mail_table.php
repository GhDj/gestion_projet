<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailTable extends Migration {

	public function up()
	{
		Schema::create('mail', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('objet');
			$table->string('contenu');
			$table->datetime('date_envoie');
		});
	}

	public function down()
	{
		Schema::drop('mail');
	}
}