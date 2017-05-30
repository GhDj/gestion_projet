<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model {

    protected $table = 'equipe';
    public $timestamps = true;
    protected $fillable=['name','id_user'];

    public function appartenir()
    {
        return $this->hasMany('equipe_user');
    }

}