<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion_user extends Model {

    protected $table = 'reunion_user';
    public $timestamps = true;
    protected $fillable=['id_reunion','id_user'];

    public function appartenir()
    {
        return $this->belongsTo('users');
    }

}