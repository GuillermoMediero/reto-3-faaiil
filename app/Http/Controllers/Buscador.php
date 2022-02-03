<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;

class Buscador extends Controller
{
    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Zona::where('zona', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 
}
