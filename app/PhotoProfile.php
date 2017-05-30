<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoProfile extends Model {

    protected $table = 'notification';
    public $timestamps = true;
    protected $fillable=['id_user','photo'];
    public function appartenir()
    {
        return $this->belongsTo('User');
    }

}