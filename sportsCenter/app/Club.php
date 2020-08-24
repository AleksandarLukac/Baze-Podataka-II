<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function coaches(){
        return $this->belongsToMany(Coach::class);
    }
}
