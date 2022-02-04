<?php

namespace App\Http\Controllers;

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
}
