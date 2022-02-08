<?php

namespace App\Http\Controllers;

use App\Models\Ascensor;
use App\Models\Asociacion;
use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void>
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->rol =="Admin"){
            return view('admin');
        }
        if(Auth::user()->rol =="Jefe"){
            /*$incidencias = Incidencia::whereIn('as_serie', function($query){
                $query->select('n_serie')
                ->from(with(new Ascensor)->getTable())
                ->where('zona_id', auth()->user()->zona);
            })->get();*/
            $incidencias = DB::table('incidencias')
                ->select(DB::raw('tipo, count(*) as estado'))
                ->whereIn('as_serie', function($query){
                $query->select('n_serie')
                ->from(with(new Ascensor)->getTable())
                ->where('zona_id', auth()->user()->zona)
                ->groupBy('tipo');
            })->get();
            return view('jefe', ['incidencias' => $incidencias]);
        }
        if(Auth::user()->rol =="Operador"){
            $incidencias = Incidencia::orderBy('prioridad','asc')->get();
            $ascensores = Ascensor::all();
            $tecnicos = User::where('rol','Tecnico')->get();
            return view('operador',['incidencias' => $incidencias,'tecnicos' => $tecnicos,'ascensores' => $ascensores]);
        }
        if(Auth::user()->rol =="Tecnico"){
            $incidencias = Incidencia::orderBy('prioridad','asc')->get();
            $ascensores = Ascensor::all();
            return view('tecnico',['incidencias' => $incidencias,'ascensores' => $ascensores]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
            return redirect('login');
    }

   
    public function edit(Request $request)
    {
        $id = $request->get('id');
        $estado = $request->get('estado');
        Incidencia::where('id',$id)->update([
            'estado'=> $estado,
        ]);
        return json_encode(array('statusCode'=>200));
    }
    
}
