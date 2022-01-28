<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    
    public function ascensores()
    {
        return $this->hasMany(Ascensor::class);
       
    }

    //Deshabilitar uso timestamps
    public $timestamps = false;
}
