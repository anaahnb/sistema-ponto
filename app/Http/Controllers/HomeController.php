<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
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
        if (Auth::user()->tipo_usuario === 'Administração') {
            $usuarios = User::paginate(10);
            return view('usuarios.index', compact('usuarios'));
        } 

        $colaboradores = Colaborador::paginate(10);
        return view('colaboradores.index', compact('colaboradores'));
    }
}
