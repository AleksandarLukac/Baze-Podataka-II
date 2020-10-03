<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [];

    public function hall(){
        return $this->belongsTo('App\Hall');
    }
    public function court(){
        return $this->belongsTo('App\Court');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
