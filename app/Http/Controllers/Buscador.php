<?php

namespace App\Http\Controllers;

use App\Models\Ascensor;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use App\Models\Zona;

class Buscador extends Controller
{

    public function autocompleteSearchZona(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = Zona::select('zona')
                        ->where('zona', 'LIKE', '%'.$query.'%')
                        ->distinct()
                        ->pluck('zona');

        return response()->json($filter_data);
    } 

    public function autocompleteSearchTipo(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = Incidencia::select('tipo')
                        ->where('tipo', 'LIKE', '%'.$query.'%')
                        ->distinct()
                        ->pluck('tipo');

        return response()->json($filter_data);
    } 
    public function prioridad(Request $request)
    {
        $prioridad = $request->get('prioridad');
        $incidencias = Incidencia::where('prioridad',$prioridad)->get();
        return  $incidencias;
    }
    public function busqueda(Request $request)
    {
        $n_serie = $request->get('n_serie');

        $direccion = $request->get('direccion');
        if(isset($n_serie)){
            $ascensores =Ascensor::where('n_serie','like','%'.$n_serie.'%')->get();
        }
        else{
            $ascensores =Ascensor::where('direccion','like','%'.$direccion.'%')->get();
        }
        return $ascensores;
    }
    
}
