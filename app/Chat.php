<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Chat extends Model {

	protected $table = 'chat';
	public $timestamps = true;
	protected $fillable=['contenu','emetteur','recepteur'];

    use Searchable;


    public function echanger()
	{
		return $this->belongsTo('User');
	}

}