<?php

namespace App\Models;

use Facade\FlareClient\Time\Time;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    //Deshabilitar uso timestamps
    public $timestamps = false;
}
