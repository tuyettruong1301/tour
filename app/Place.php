<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function road_places()
    {
        return $this->hasMany(Road_Place::class);
    }
}
