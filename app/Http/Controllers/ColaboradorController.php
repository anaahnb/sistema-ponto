<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColaboradorInserirRequest;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Colaborador;
use App\Models\Funcao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Horario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ColaboradorController extends Controller
{

    public function index()
    {
        $colaboradores = Colaborador::all();
        return view('colaboradores.index', compact('colaboradores'));
    }

    public function create()
    {
        $cargos = Cargo::all();
        $funcoes = Funcao::all();
        $turnos = ['Entrada da manhã', 'Saída da manhã', 'Entrada da tarde', 'Saída da tarde'];
        $diasDaSemana = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'];

        return view('colaboradores.inserir', compact('cargos', 'funcoes', 'turnos', 'diasDaSemana'));
    }

    public function store(ColaboradorInserirRequest $request) {
        
        $usuario = User::create([
            'name' => $request->colaborador_nome,
            'email' => $request->colaborador_email,
            'password' => Hash::make(123)
        ]);
        // dd($usuario->user_id);
        $colaborador = Colaborador::criarColaborador($request, $usuario->user_id);
        

        $this->associarHorariosAoColaborador($request, $colaborador);

        return redirect()->route('colaboradores.index')->with('sucesso', 'Colaborador inserido com sucesso!');
    }

    private function associarHorariosAoColaborador(Request $request, Colaborador $colaborador) {
        // Lógica para associar os horários ao colaborador
        foreach ($request->diasDaSemana as $dia => $turnos) {
            foreach ($turnos as $turno => $horario) {
                // @dd($request->all());
                Horario::create([
                    'colaborador_id' => $colaborador->colaborador_id,
                    'dia' => $dia,
                    'turno' => $turno,
                    'horario_ponto' => $horario,
                    // 'saida' => $horario
                ]);
            }
        }
    }

    public function edit($id) {
        $colaboradores = Colaborador::findOrFail($id);
        $usuarios = User::all();
        $cargos = Cargo::all();

        return view('colaboradores.edit', compact('colaborador', 'usuarios', 'cargos'));
    }

    public function update(Request $request, $id) {
        
        $request->validate([
            'cpf' => [
                'required',
                'numeric',
                Rule::unique('colaboradores')->whereNull('data_rescisao'),
            ],

            'nome' => 'required|regex:/^[A-Z][a-z]+ [A-Z][a-z]+$/',
            'email' => 'required|email',
            'data_nascimento' => 'required|date',
            'data_admissao' => 'required|date|before_or_equal:today',
            'cargo_id' => 'required|exists:cargos,id',
            'funcao_id' => 'required|exists:funcoes,id',
            'data_rescisao' => 'nullable|date|after:data_admissao',
        ]);

        $colaborador = Colaborador::findOrFail($id);
        $colaborador->update($request->all());

        return redirect()->route('colaboradores.index')->with('sucesso', 'Colaborador atualizado com sucesso!');
    }

    public function destroy($id)
    {
        
        $colaborador = Colaborador::findOrFail($id);
        $colaborador->delete();

        return redirect()->route('colaboradores.index')->with('sucesso', 'Colaborador excluído com sucesso!');
    }
}
