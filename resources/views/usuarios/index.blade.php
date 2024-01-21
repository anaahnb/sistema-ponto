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
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800"> Usuários </p>
                <div class="flex items-center">
                    <a href="{{ route('usuarios.create') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white"> Adicionar usuário </p>
                    </a>
                </div>
            </div>
        </div>

        <div class="flex flex-col my-8">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400"> ID </th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400"> Usuário </th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400"> E-mail </th>
                                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-gray-400"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($usuarios as $usuario)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"> {{ $usuario->user_id }} </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> {{ $usuario->name }} </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> {{ $usuario->email }} </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm">
                                            <a href="{{ route('usuarios.edit', $usuario->user_id) }}" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                <i class="h-5" data-feather="edit"></i>
                                            </a>

                                            <a href="{{ route('usuarios.destroy', $usuario->user_id) }}" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                <i class="h-5" data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <td>
                                        <p class="p-6 text-sm font-medium leading-6 text-gray-600 flex items-center gap-3">
                                            <i class="h-5" data-feather="frown"></i> Nenhum usuário encontrado.
                                        </p>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection