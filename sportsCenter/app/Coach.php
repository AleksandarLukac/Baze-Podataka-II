<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $guarded = [];
    //primary key
    public $primaryKey = 'id';

    public function clubs(){
        return $this->belongsToMany(Club::class);
    }
}
