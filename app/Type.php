<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
