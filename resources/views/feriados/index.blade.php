@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <div class="mx-auto max-w-7xl px-4 md:px-10 py-4 md:py-7">
        
        @if(session('sucesso'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Oba!</span> {{session('sucesso')}}
            </div>
        @endif

        <div>
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800"> Feriados </p>
                <div class="flex items-center">
                    <a href="{{ route('feriados.create') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white"> Adicionar feriado </p>
                    </a>
                </div>
            </div>
        </div>

        <style>
            [x-cloak] {
                display: none;
            }
        </style>
        
        <form action="GET" action="{{ route('feriados.index') }}">
            <div class="flex flex-col my-8">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400"> ID </th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400"> Descrição </th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400"> Data </th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-gray-400"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @forelse ($feriados as $feriado)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"> {{ $feriado->feriado_id }} </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> {{ $feriado->feriado_descricao }} </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> {{ date('d-m-Y', strtotime($feriado->feriado_data)) }} </td>
        
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm">
                                                <a href="{{ route('feriados.edit', $feriado->feriado_id) }}" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    <i class="h-5" data-feather="edit"></i>
                                                </a>
        
                                                <a href="{{ route('feriados.destroy', $feriado->feriado_id) }}" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    <i class="h-5" data-feather="trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td>
                                            <p class="p-6 text-sm font-medium leading-6 text-gray-600 flex items-center gap-3">
                                                <i class="h-5" data-feather="frown"></i> Nenhum feriado encontrado.
                                            </p>
                                        </td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        

        <div class="antialiased h-screen pt-8">
            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div>
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="flex items-center justify-between py-2 px-6">
                            <div>
                                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                            </div>
                            <div class="border rounded-lg px-1" style="padding-top: 2px;">
                                <button 
                                    type="button"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center" 
                                    :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                    :disabled="month == 0 ? true : false"
                                    @click="month--; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>  
                                </button>
                                <div class="border-r inline-flex h-6"></div>		
                                <button 
                                    type="button"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1" 
                                    :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                    :disabled="month == 11 ? true : false"
                                    @click="month++; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>									  
                                </button>
                            </div>
                        </div>	
        
                        <div class="-mx-1 -mb-1">
                            <div class="flex flex-wrap" style="margin-bottom: -40px;">
                                <template x-for="(day, index) in DAYS" :key="index">	
                                    <div style="width: 14.26%" class="px-2 py-2">
                                        <div
                                            x-text="day" 
                                            class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
                                    </div>
                                </template>
                            </div>
        
                            <div class="flex flex-wrap border-t border-l">
                                <template x-for="blankday in blankdays">
                                    <div 
                                        style="width: 14.28%; height: 120px"
                                        class="text-center border-r border-b px-4 pt-2"	
                                    ></div>
                                </template>	
                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                    <div style="width: 14.28%; height: 120px" class="px-4 pt-2 border-r border-b relative">
                                        <div
                                            x-text="date"
                                            class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                            :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                                        ></div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="{{ asset('js/calendario.js') }}"></script>

@endsection