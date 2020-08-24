<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    public function courts(){
        return $this->hasMany('App\Court');
    }

    public function appointments(){
        return $this->belongsToMany(Appointment::class);
    }
}
