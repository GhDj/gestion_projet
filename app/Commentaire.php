<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model {

    protected $table = 'commentaire';
    public $timestamps = true;
    protected $fillable=['commentaire','id_tache','id_user'];

    public function appartenir()
    {
        return $this->belongsTo('users');
    }

}