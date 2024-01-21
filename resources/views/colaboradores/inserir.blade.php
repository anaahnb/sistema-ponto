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
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800"> 
                    Inserir colaborador 
                </p>
            </div>
        </div>

        <form action="{{ route('colaboradores.store') }}" method="POST">
            @csrf
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="cpf" class="block text-sm font-medium leading-6 text-gray-900">CPF</label>
                        <div class="mt-2">
                            <input placeholder="Digite o CPF" type="text" id="colaborador_cpf" name="colaborador_cpf" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('colaborador_cpf') is-invalid @enderror">
                            @error('colaborador_cpf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                        <div class="mt-2">
                            <input placeholder="Digite o nome completo do colaborador" type="text" name="colaborador_nome" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('colaborador_nome') is-invalid @enderror">
                            @error('colaborador_nome')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900"> E-mail </label>
                        <div class="mt-2">
                            <input placeholder="Digite o e-mail" id="colaborador_email" name="colaborador_email" type="email" autocomplete="email" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('colaborador_email') is-invalid @enderror">
                            @error('colaborador_email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="data_nascimento" class="block text-sm font-medium leading-6 text-gray-900"> Data de nascimento </label>
                        <div class="mt-2">
                            <input name="colaborador_data_nascimento" type="date" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('colaborador_data_nascimento') is-invalid @enderror">
                            @error('colaborador_data_nascimento')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="data_admissao" class="block text-sm font-medium leading-6 text-gray-900"> Data de admissão </label>
                        <div class="mt-2">
                            <input name="colaborador_data_admissao" type="date" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('colaborador_data_admissao') is-invalid @enderror">
                            @error('colaborador_data_admissao')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="cargo_id" class="block text-sm font-medium leading-6 text-gray-900"> Cargo </label>
                        <div class="mt-2">
                            <select id="cargo_id" name="cargo_id" class="p-2.5 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('cargo_id') is-invalid @enderror">
                                <option value="" disabled selected>Selecione o cargo do colaborador</option>
                                @foreach($cargos as $cargo)
                                    <option value="{{ $cargo->cargo_id }}">{{ $cargo->cargo_nome }}</option>
                                @endforeach
                            </select>
                            @error('cargo_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="funcao_id" class="block text-sm font-medium leading-6 text-gray-900">Função</label>
                        <div class="mt-2">
                            <select id="funcao_id" name="funcao_id" class="p-2.5 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('funcao_id') is-invalid @enderror">
                                <option value="" disabled selected>Selecione a função do colaborador</option>
                                @foreach($funcoes as $funcao)
                                    <option value="{{ $funcao->funcao_id }}">{{ $funcao->funcao_nome }}</option>
                                @endforeach
                            </select>
                            @error('funcao_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="data_rescisao" class="block text-sm font-medium leading-6 text-gray-900"> Data de rescisão </label>
                        <div class="mt-2">
                            <input name="colaborador_data_rescisao" type="date" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('colaborador_data_rescisao') is-invalid @enderror">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="usuario" class="block text-sm font-medium leading-6 text-gray-900"> Usuário </label>
                        <div class="mt-2">
                            <input name="usuario" type="text" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col mt-8">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <p tabindex="0" class="focus:outline-none text-base text-lg font-bold leading-normal text-gray-800 mb-3"> Horários </p>
                        <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
            
                            <div class="table-container">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400"></th>
                                            <!-- Dias da semana gerados dinamicamente -->
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            <!-- Campos de horário de entrada da manhã, saída da manhã, entrada da tarde e saída da tarde de forma dinamica -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="mt-8 block rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-medium text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cadastrar colaborador
                </button>
            </div>

        </form>
    </div>

    <script src="{{ asset('js/criarTabelaHorarios.js') }}"></script>


@endsection