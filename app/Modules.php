<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model {

	protected $table = 'modules';
	public $timestamps = true;
    protected $fillable=['designation','nbr_points','avancement','statut_module','id_projet'];
	public function appartenir()
	{
		return $this->belongsTo('Projet');
	}

}