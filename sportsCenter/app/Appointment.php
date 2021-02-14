<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    //use SoftDeletes;

    protected $guarded = [];
    protected $fillable = ['begining', 'end'];

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
