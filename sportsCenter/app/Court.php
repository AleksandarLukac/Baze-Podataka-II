<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $guarded = [];
    protected $fillable = ['kind'];

    public function hall(){
        return $this->belongsTo('App\Hall');
    }
    public function appointments(){
        return $this->belongsToMany(Appointment::class);
    }
}
