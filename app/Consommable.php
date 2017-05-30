<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consommable extends Model {

	protected $table = 'consommable';
	public $timestamps = true;
	protected $fillable =['nom','quantite_estime','id_tache'];

	public function appartenir()
	{
		return $this->belongsTo('Tache');
	}

}