<?php

namespace App\Http\Controllers;

use App\Models\Feriado;
use Illuminate\Http\Request;

class FeriadoController extends Controller
{
    public function index()
    {
        $feriados = Feriado::all();
        return view('feriados.index', compact('feriados'));
    }

    public function create()
    {
        return view('feriados.inserir');
    }

    public function store(Request $request)
    {
        $request->validate([
            'feriado_descricao' => 'required',
            'feriado_data' => 'required|date|unique:feriados',
        ]);

        Feriado::create([
            'feriado_descricao' => $request->input('feriado_descricao'),
            'feriado_data' => $request->input('feriado_data'),
        ]);

        return redirect()->route('feriados.index')->with('sucesso', 'Feriado cadastrado com sucesso!');
    }

    public function edit($id) {
        $feriado = Feriado::findOrFail($id);
        return view('feriados.inserir', compact('feriado'));
    }


    public function update(Request $request, $id) {
        $feriado = Feriado::findOrFail($id);
        $feriado->update($request->all());
        return redirect()->route('feriados.index');
    }

    public function destroy($id) {
        $feriado = Feriado::findOrFail($id);
        $feriado->delete();
        return redirect()->route('feriados.index')->with('sucesso', 'Feriado atualizado com sucesso!');
    }
}
