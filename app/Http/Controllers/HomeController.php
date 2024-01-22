<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Horario;
use App\Models\User;
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

        // dd(Auth::user()->tipo_usuario);
        if (Auth::user()->tipo_usuario == 'Administrador') {
        
            $usuarios = User::paginate(10);
            return view('usuarios.index', compact('usuarios'));

        } else if (Auth::user()->tipo_usuario == 'Colaborador') {
            $colaboradores = Colaborador::where('user_id','=',Auth::id())->first();
            // $horarios = Horario::where('colaborador_id','=','colaboradores.colaborador_id');
            // @dd($colaboradores->name);
            return view('registro', compact('colaboradores'));
        }

    }
}
