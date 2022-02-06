<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    public function ascensores()
    {
        return $this->hasMany(Ascensor::class);
    }
    public function asociaciones()
    {
        return $this->hasMany(Asociacion::class);
    }
}
