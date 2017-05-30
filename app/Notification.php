<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

    protected $table = 'notification';
    public $timestamps = true;
    protected $fillable=['type','lu','id_user','idType'];
    public function appartenir()
    {
        return $this->belongsTo('User');
    }

}