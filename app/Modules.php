<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model {

	protected $table = 'modules';
	public $timestamps = true;
    protected $fillable=['designation','id_projet'];
	public function appartenir()
	{
		return $this->belongsTo('Projet');
	}

}