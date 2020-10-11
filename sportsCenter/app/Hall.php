<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $guarded = [];

    public function courts(){
        return $this->hasMany('App\Court');
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
