<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Actualizaciones;
use App\Models\Ascensor;
use App\Models\Asociacion;
use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use App\Models\Modelo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
                ->where('zona_id', auth()->user()->zona);
                })->groupBy('tipo')
                ->get();
            $completas = DB::table('incidencias')
                ->select(DB::raw('tipo, count(*) as estado'))
                ->whereIn('as_serie', function($query){
                $query->select('n_serie')
                ->from(with(new Ascensor)->getTable())
                ->where('zona_id', auth()->user()->zona);
                })->where('estado',3)
                ->groupBy('tipo')
                ->get();
            $num_series = DB::table('incidencias')
                ->select(DB::raw('as_serie, count(*) as numero'))
                ->whereIn('as_serie', function($query){
                $query->select('n_serie')
                ->from(with(new Ascensor)->getTable())
                ->where('zona_id', auth()->user()->zona);
                })->groupBy('as_serie')
                ->get();
            $top_num_series = DB::table('incidencias')
                ->select(DB::raw('as_serie, count(*) as numero'))
                ->whereIn('as_serie', function($query){
                $query->select('n_serie')
                ->from(with(new Ascensor)->getTable())
                ->where('zona_id', auth()->user()->zona);
                })->groupBy('as_serie')
                ->orderBy('numero','desc')
                ->get();
            $modelos = DB::table('incidencias')
                ->select(DB::raw('as_serie, count(*) as numero'))
                ->whereIn('as_serie', function($query){
                $query->select('n_serie')
                ->from(with(new Ascensor)->getTable())
                ->where('zona_id', auth()->user()->zona)
                ->whereIn('modelo_id', function($query){
                    $query->select('id')
                    ->from(with(new Modelo())->getTable());
                });
                })->groupBy('as_serie')
                ->get();
            /*$modelos = DB::table('incidencias','ascensors','modelos')
                    ->select(DB::raw('count(*) as numero, modelos.marca as marca'))
                    ->where('incidencias.as_serie','ascensors.n_serie')
                    ->where('ascensors.modelo_id','modelos.id')
                    ->where('zona_id', auth()->user()->zona)
                    ->groupBy('incidencias.as_serie')
                    ->get();*/
            $top_modelos = DB::table('incidencias')
                ->select(DB::raw('as_serie, count(*) as numero'))
                ->whereIn('as_serie', function($query){
                $query->select('n_serie')
                ->from(with(new Ascensor)->getTable())
                ->where('zona_id', auth()->user()->zona)
                ->whereIn('modelo_id', function($query){
                    $query->select('id')
                    ->from(with(new Modelo())->getTable());
                });
                })->groupBy('as_serie')
                ->orderBy('numero','desc')
                ->get();
            return view('jefe', ['incidencias' => $incidencias, 'completas' => $completas, 'num_series' => $num_series, 'top_num_series' => $top_num_series, 'modelos' => $modelos, 'top_modelos' => $top_modelos]);
        }
        if(Auth::user()->rol =="Operador"){
            $incidencias = Incidencia::orderBy('prioridad','asc')->get();
            $ascensores = Ascensor::all();
            $tecnicos = User::where('rol','Tecnico')->get();
            return view('operador',['incidencias' => $incidencias,'tecnicos' => $tecnicos,'ascensores' => $ascensores]);
        }
        if(Auth::user()->rol =="Tecnico"){
            $actualizaciones = Actualizaciones::where('tecnico_id',Auth::user()->id)->first();
            $incidencias = Incidencia::orderBy('prioridad','asc')->get();
            $ascensores = Ascensor::all();
            $usuario = User::where('rol','Tecnico')->where('id',Auth::user()->id)->first();
            $nuevo = 1;
            if($actualizaciones === null){
                $nuevo = 0;
            }
            Actualizaciones::where('tecnico_id',Auth::user()->id)->delete();
            return view('tecnico',['incidencias' => $incidencias,'ascensores' => $ascensores,'nuevo'=>$nuevo ,'usuario'=>$usuario]);
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
    public function busqueda(Request $request){
        $texto = $request->get('texto');
        $incidencias = Incidencia::where('as_serie', 'LIKE', '%'.$texto.'%')->get();
        $ascensores = Ascensor::all();
        return json_encode(array('statusCode'=>200));
    }
    public function show(Request $request)
    {   
        if(Auth::user()->rol == "Tecnico"){
            $texto = $request->input('buscartecnico');
            $incidencias = Incidencia::where('as_serie', 'like', '%'.$texto.'%')->orderBy('prioridad','asc')->get();
            $ascensores = Ascensor::all();
            return view('tecnico',['incidencias' => $incidencias,'ascensores' => $ascensores]);
        }
        else{
            $texto = $request->input('buscaroperador');
            $ascensores = Ascensor::where('zona_id', 'like', '%'.$texto.'%')->get();
            $tecnicos = User::where('rol','Tecnico')->get();
            $incidencias= Incidencia::orderBy('prioridad','asc')->get();
            return view('operador',['incidencias' => $incidencias,'tecnicos' => $tecnicos,'ascensores' => $ascensores]);
        }
    }
    public function prioridad()
    {
        if(Auth::user()->rol == "Tecnico"){
            $incidencias = Incidencia::where('prioridad',1)->get();
            $ascensores = Ascensor::all();
            return view('tecnico',['incidencias' => $incidencias,'ascensores' => $ascensores]);
        }
        else{
            $incidencias = Incidencia::where('prioridad',1)->get();
            $ascensores = Ascensor::all();
            $tecnicos = User::where('rol','Tecnico')->get();
            return view('operador',['incidencias' => $incidencias,'tecnicos' => $tecnicos,'ascensores' => $ascensores]);
        }
    }
    public function store(Request $request)
    {
        $tecnico = $request->input('idtecnico');
        $incidencia = $request->input('idincidencia');
        Incidencia::where('id',$incidencia)->update([
            'tecnico_id'=> $tecnico,
        ]);
        DB::insert('insert into actualizaciones (tecnico_id, incidencia_id) values (?, ?)', [$tecnico, $incidencia]);
            $incidencias = Incidencia::orderBy('prioridad','asc')->get();
            $ascensores = Ascensor::all();
            $tecnicos = User::where('rol','Tecnico')->get();
            return view('operador',['incidencias' => $incidencias,'tecnicos' => $tecnicos,'ascensores' => $ascensores]);
    }
    public function perfil(Request $request)
    {
        $usuario = User::where('id',Auth::user()->id)->first();
        return view('perfil',['usuario' => $usuario]);
    }
    public function crearUsuario(Request $request)
    {
        return view('crearusuario');
    }
    public function crearIncidencia(Request $request)
    {
        $ascensores= Ascensor::all();
        return view('crearincidencia',['ascensores' => $ascensores]);
    }
    public function storeIncidencia(Request $request){
        $incidencia_id = Incidencia::latest('id')->first()->id;
        DB::insert('insert into actualizaciones (tecnico_id, incidencia_id) values (11, ?)',[$incidencia_id]);
        $incidencia = new Incidencia;
        $incidencia->as_serie = $request->get('n_serie');
        $incidencia->prioridad = $request->get('prioridad');
        $incidencia->estado ='0';
        $incidencia->detalles_op = $request->get('detalles_op');
        $incidencia->detalles_tec = 'Detalles tecnico';
        $incidencia->tecnico_id = 11;
        $incidencia->created_at= Carbon::now();            /*->format('Y-m-d H:i:s')*/
        $incidencia->updated_at= Carbon::now();            /*->format('Y-m-d H:i:s')*/
        $incidencia->save();
        return redirect()->route('home');
    }
    public function storeUsuario(Request $request){
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('contrasena'));
        $user->rol = $request->get('rol');
        $user->created_at= Carbon::now();            /*->format('Y-m-d H:i:s')*/
        $user->updated_at= Carbon::now();            /*->format('Y-m-d H:i:s')*/
        $user->zona = $request->get('zona');
        $user->save();
        return redirect()->route('home');
    }
}
