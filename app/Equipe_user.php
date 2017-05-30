<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe_user extends Model {

    protected $table = 'equipe_user';
    public $timestamps = false;
    protected $fillable=['id_equipe','id_user'];

    public function appartenir()
    {
        return $this->belongsTo('users');
    }

}