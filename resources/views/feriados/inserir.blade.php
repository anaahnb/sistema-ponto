@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <div class="mx-auto max-w-7xl px-4 md:px-10 py-4 md:py-7">

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

        <div>
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800"> Inserir feriado </p>
            </div>
        </div>

        <form class="space-y-6" action="{{ isset($feriado) ? route('feriados.update', $feriado->feriado_id) : route('feriados.store') }}" method="POST">
            @csrf

            @if(isset($feriado))
                @method('PUT')
            @endif

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="feriado_descricao" class="block text-sm font-medium leading-6 text-gray-900"> Descrição </label>
                    <div class="mt-2">
                        <input value="{{ isset($feriado) ? $feriado->feriado_descricao : old('feriado_descricao') }}" placeholder="Digite a descrição do feriado" name="feriado_descricao" type="text" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="feriado_data" class="block text-sm font-medium leading-6 text-gray-900"> Data </label>
                    <div class="mt-2">
                        <input value="{{ isset($feriado) ? $feriado->feriado_data : old('feriado_data') }}" name="feriado_data" type="date" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    {{ isset($feriado) ? 'Atualizar feriado' : 'Cadastrar feriado' }}
                </button>
            </div>

        </form>

        
    </div>
  

@endsection