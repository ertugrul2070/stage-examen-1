<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function vasttags()
    {
        return $this->hasMany(Vasttag::class);
    }
}
