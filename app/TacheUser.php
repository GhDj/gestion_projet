<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacheUser extends Model {

    protected $table = 'tacheuser';
    public $timestamps = false;
    protected $fillable=['id_tache','id_user'];

    public function appartenir()
    {
        return $this->belongsTo('users');
    }

}