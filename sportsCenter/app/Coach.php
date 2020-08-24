<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    //primary key
    public $primaryKey = 'id';

    public function clubs(){
        return $this->belongsToMany(Club::class);
    }
}
