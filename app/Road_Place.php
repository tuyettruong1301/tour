<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road_Place extends Model
{
    protected $table = 'road_places';

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function road()
    {
        return $this->belongsTo(Road::class);
    }
}
