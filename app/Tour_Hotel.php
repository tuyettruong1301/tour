<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour_Hotel extends Model
{
    protected $table = 'tour_hotels';

    public function tour()
    { 
        return $this->belongsTo(Tour::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
