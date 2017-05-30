<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentsTable extends Migration {

	public function up()
	{
		Schema::create('documents', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nom_doc');
			$table->string('type_doc');
			$table->string('url_doc');
			$table->string('date_edition');
			$table->integer('id_projet')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('documents');
	}
}