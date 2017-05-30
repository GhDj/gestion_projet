<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacheEquipe extends Model {

    protected $table = 'tacheequipe';
    public $timestamps = false;
    protected $fillable=['id_tache','id_equipe'];

    public function appartenir()
    {
        return $this->belongsTo('users');
    }

}