<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociacion extends Model
{
    use HasFactory;
    public function incidencias()
    {
        return $this->belongsTo(Incidencia::class);
       
    }
    public function modelos()
    {
        return $this->belongsTo(User::class);
       
    }
    //Deshabilitar uso timestamps
    public $timestamps = false;
}
