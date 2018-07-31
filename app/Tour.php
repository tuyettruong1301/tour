<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function road()
    {
        return $this->belongsTo(Road::class);
    }

    public function tour_hotels()
    {
        return $this->hasMany(Tour_Hotel::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function departions()
    {
        return $this-> hasMany(Departion::class);
    }
}
