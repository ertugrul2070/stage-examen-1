<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function zones()
    {
        return $this->hasMany(Zone::class);
    }
}
