@extends('layouts.app')

@section('content')
<div>
    <div class="mx-auto max-w-7xl space-y-5">
        <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
          <h1 class="text-4xl font-bold tracking-tight text-gray-900">Registro de ponto</h1>
  
            <div class="flex items-center">
                <div class="relative inline-block text-left">
                    <div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="group gap-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                Sair
                                <i class="h-5" data-feather="log-out"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900"> {{ date('d/m/Y H:i') }} </h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Colaborador: {{ $colaborador }} </p>
        </div>

        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Horários</dt>
                </div>
            </dl>
        </div>
    </div>
    


        
  </div>
  
@endsection