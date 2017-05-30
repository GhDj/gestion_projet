<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model {

	protected $table = 'materiel';
	public $timestamps = true;
	protected $fillable=['nom_materiel','id_tache'];

}