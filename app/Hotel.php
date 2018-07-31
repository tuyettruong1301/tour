<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function tour_hotels()
    {
        return $this->hasMany(Tour_Hotel::class);
    }
}
