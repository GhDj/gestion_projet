<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model {

	protected $table = 'projet';
	public $timestamps = true;
	protected $fillable = ['nomProjet','description','budget','date_debut','date_fin','lieu','id_user','id_service','etat','id_equipe'];

	use Searchable;

	public function composer()
	{
		return $this->hasMany('Modules');
	}

	public function contient()
	{
		return $this->hasMany('Documents');
	}

	public function creer()
	{
		return $this->belongsTo('User');
	}

	public function avoir()
	{
		return $this->hasMany('Service');
	}

  /* public function searchableAs()
    {
        return 'projets_index';
    }

    public function toSearchableArray()
    {


        $array = $this->toArray();
        //$array=['nomProjet','description'];


        return $array;
    }
*/
}