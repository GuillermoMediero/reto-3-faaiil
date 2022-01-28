<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ascensor extends Model
{
    use HasFactory;
    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
       
    }
    public function modelos()
    {
        return $this->belongsTo(Modelo::class);
       
    }
    //Deshabilitar uso timestamps
    public $timestamps = false;
}
