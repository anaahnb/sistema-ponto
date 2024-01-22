<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\RegistroPonto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroPontoController extends Controller
{
    public function create() {
        $colaboradores = Colaborador::findOrFail(Auth::id())->first();
        // dd($colaboradores);
        return view('registro', compact('colaboradores'));

    }

    public function store(Request $request) {

        if(date('H:i:s') < '13:00:00'){
            RegistroPonto::create([
                "colaborador_id" => Auth::id(),
                "turno" => "Manhã",
                "registro_ponto_horario" => date('H:i:s'),
            ]);
        } else {
            RegistroPonto::create([
                "colaborador_id" => Auth::id(),
                "turno" => "Tarde",
                "registro_ponto_horario" => date('H:i:s'),
            ]);
        }

        return redirect()->route('welcome', compact('colaborador'))->with('sucesso', 'Ponto registrado com sucesso!');

        
    }
}
