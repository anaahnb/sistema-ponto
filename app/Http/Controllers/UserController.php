<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.inserir');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:users',
            'tipo_usuario' => 'required|in:Administrador,Colaborador',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário cadastrado com sucesso!');
    }


    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.inserir', compact('usuario'));
    }

    public function update(Request $request, $id) {
        
        $usuario = User::findOrFail($id);
        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id) {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário deletado com sucesso!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
