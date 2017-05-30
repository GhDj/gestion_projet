<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model {

	protected $table = 'reunion';
	public $timestamps = true;
	protected $fillable = ['designation','nbr_present','code_afaire','type','id_projet','dateReunion','Emplacement','timeReunion'];

	public function composer()
	{
		return $this->hasMany('User');
	}

}