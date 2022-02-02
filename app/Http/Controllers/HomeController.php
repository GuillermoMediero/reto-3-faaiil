<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('jefe');
        }
        if(Auth::user()->rol =="Operador"){
            return view('operador');
        }
        if(Auth::user()->rol =="Tecnico"){
            return view('tecnico');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
            return redirect('login');
    
        
    }
    
}
