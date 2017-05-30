<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

	protected $table = 'service';
	public $timestamps = true;
	protected $fillable=['nom_service','chef_service'];

	public function gerer()
	{
		return $this->belongsTo('Projet');
	}

}