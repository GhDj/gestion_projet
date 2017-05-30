<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('projet', function(Blueprint $table) {
			$table->foreign('id_user')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('projet', function(Blueprint $table) {
			$table->foreign('id_service')->references('id')->on('service')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('modules', function(Blueprint $table) {
			$table->foreign('id_projet')->references('id')->on('projet')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tache', function(Blueprint $table) {
			$table->foreign('id_module')->references('id')->on('modules')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->foreign('id_projet')->references('id')->on('projet')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('logistique', function(Blueprint $table) {
			$table->foreign('id_tache')->references('id')->on('tache')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('materiel', function(Blueprint $table) {
			$table->foreign('id_tache')->references('id')->on('tache')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reunion', function(Blueprint $table) {
			$table->foreign('id_projet')->references('id')->on('projet')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('projet', function(Blueprint $table) {
			$table->dropForeign('projet_id_user_foreign');
		});
		Schema::table('projet', function(Blueprint $table) {
			$table->dropForeign('projet_id_service_foreign');
		});
		Schema::table('modules', function(Blueprint $table) {
			$table->dropForeign('modules_id_projet_foreign');
		});
		Schema::table('tache', function(Blueprint $table) {
			$table->dropForeign('tache_id_module_foreign');
		});
		Schema::table('documents', function(Blueprint $table) {
			$table->dropForeign('documents_id_projet_foreign');
		});
		Schema::table('logistique', function(Blueprint $table) {
			$table->dropForeign('logistique_id_tache_foreign');
		});
		Schema::table('materiel', function(Blueprint $table) {
			$table->dropForeign('materiel_id_tache_foreign');
		});
		Schema::table('reunion', function(Blueprint $table) {
			$table->dropForeign('reunion_id_projet_foreign');
		});
	}
}