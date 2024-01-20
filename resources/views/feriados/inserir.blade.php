@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <div class="mx-auto max-w-7xl px-4 md:px-10 py-4 md:py-7">
        <div>
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800"> Inserir feriado </p>
            </div>
        </div>

        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="sm:col-span-4">
                <label for="feriado_descricao" class="block text-sm font-medium leading-6 text-gray-900">Descrição</label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="feriado_descricao" class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                    </div>
                </div>
            </div>
    
            <div class="sm:col-span-4">
                <label for="feriado_data" class="block text-sm font-medium leading-6 text-gray-900"> Data </label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="date" name="feriado_data" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                    </div>
                </div>
            </div>

        </form>

        
    </div>
  

@endsection