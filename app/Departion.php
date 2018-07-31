<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departion extends Model
{
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
