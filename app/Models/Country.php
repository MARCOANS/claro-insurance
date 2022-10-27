<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    //Estados del pais
    public function states()
    {
        return $this->hasMany(State::class)->orderBy('name');
    }
}
