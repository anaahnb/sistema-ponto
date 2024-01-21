@extends('layouts.app')

@section('content')

    @include('components.navbar')

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium"> Erro! :( </span> <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mx-auto max-w-7xl px-4 md:px-10 py-4 md:py-7">
        <div>
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800"> Inserir usuário </p>
            </div>
        </div>

        <form class="space-y-6" action="{{ isset($usuario) ? route('usuarios.update', $usuario->user_id) : route('usuarios.store') }}" method="POST">
            @csrf

            @if(isset($usuario))
                @method('PUT')
            @endif

            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-3">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900"> Usuário </label>
                        <div class="mt-2">
                            <input value="{{ isset($usuario) ? $usuario->name : old('name') }}" placeholder="Digite o nome de usuário" name="name" type="text" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" {{isset($usuario) ? 'readonly' : '' }}>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900"> E-mail </label>
                        <div class="mt-2">
                            <input value="{{ isset($usuario) ? $usuario->email : old('email') }}" placeholder="Digite o e-mail" name="email" type="email" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="tipo_usuario" class="block text-sm font-medium leading-6 text-gray-900">Tipo de Usuário</label>
                        <div class="mt-2">
                            <select id="tipo_usuario" name="tipo_usuario" required class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="">Selecione um tipo de usuário</option>
                                <option value="Administrador" {{ (isset($usuario) && $usuario->tipo_usuario == 'Administrador') ? 'selected' : (old('tipo_usuario') == 'Administrador' ? 'selected' : '') }}>Administrador</option>
                                <option value="Colaborador" {{ (isset($usuario) && $usuario->tipo_usuario == 'Colaborador') ? 'selected' : (old('tipo_usuario') == 'Colaborador' ? 'selected' : '') }}>Colaborador</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900"> Senha </label>
                        <div class="mt-2">
                            <input placeholder="Digite uma senha para o usuário" name="password" type="password" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900"> Confirme a senha </label>
                        <div class="mt-2">
                            <input placeholder="Digite a confirmação da senha" id="password_confirmation" name="password_confirmation" type="password" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="mt-5 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    {{ isset($usuario) ? 'Atualizar usuário' : 'Cadastrar usuário' }}
                </button>
            </div>
        </form>
    </div>
@endsection
