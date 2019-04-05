<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vasttag extends Model
{
    public function Zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
