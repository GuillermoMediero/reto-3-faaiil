<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;

class Buscador extends Controller
{

    public function autocompleteSearch(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = Zona::select('zona')
                        ->where('zona', 'LIKE', '%'.$query.'%')
                        ->distinct()
                        ->pluck('zona');

        return response()->json($filter_data);
    } 
}