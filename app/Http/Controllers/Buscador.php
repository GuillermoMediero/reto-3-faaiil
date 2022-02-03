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

        $filter_data = Zona::select('name')
                        ->where('zona', 'LIKE', '%'.$query.'%')
                        ->get();

        return response()->json($filter_data);
    } 
}
