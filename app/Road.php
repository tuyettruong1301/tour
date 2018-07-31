<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    public function road_places()
    {
        return $this->hasMany(Road_Place::class);
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
