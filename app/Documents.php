<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model {

	protected $table = 'documents';
	public $timestamps = true;
	protected $fillable=['nom_doc','type_doc','url_doc','id_projet'];

	public function realiser_par()
	{
		return $this->belongsTo('User');
	}

	public function appartenir()
	{
		return $this->belongsTo('Projet');
	}

}