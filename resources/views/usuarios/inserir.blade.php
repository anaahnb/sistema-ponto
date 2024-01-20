@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <div class="mx-auto max-w-7xl px-4 md:px-10 py-4 md:py-7">
        <div>
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800"> 
                    Inserir usuário 
                </p>
            </div>
        </div>

        {{-- <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="space-y-2">
                <div class="sm:col-span-4">
                    <label for="cpf" class="block text-sm font-medium leading-6 text-gray-900">CPF</label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input id="cpf" type="number" name="cpf" class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite o número do CPF do usuário">
                        </div>
                    </div>
                </div>
    
                <div class="flex gap-x-2 sm:col-span-2">
                    <div class="flex h-6 items-center">
                        <input required type="checkbox"> 
                    </div>
                    <label class="text-sm leading-6 text-gray-600">
                        Ativo?
                    </label>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900"> Nome completo </label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="name" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                    </div>
                </div>
            </div>

            <div class="flex space-x-6">
                <div class="sm:col-span-4">
                    <label for="data_nascimento" class="block text-sm font-medium leading-6 text-gray-900"> Data de nascimento </label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="date" name="data_nascimento" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                        </div>
                    </div>
                </div>
    
                <div class="sm:col-span-4">
                    <label for="data_admissao" class="block text-sm font-medium leading-6 text-gray-900"> Data de admissão </label>
                    <div class="mt-2">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="date" name="data_admissao" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                        </div>
                    </div>
                </div>
            </div>




            <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900"> E-mail </label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="email" name="email" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="data_nascimento" class="block text-sm font-medium leading-6 text-gray-900"> Cargo </label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="data_nascimento" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="data_nascimento" class="block text-sm font-medium leading-6 text-gray-900"> Função </label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="data_nascimento" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="data_nascimento" class="block text-sm font-medium leading-6 text-gray-900"> Data de recisão </label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="data_nascimento" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                    </div>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="data_nascimento" class="block text-sm font-medium leading-6 text-gray-900"> Usuário </label>
                <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="data_nascimento" class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Digite a descrição do feriado">
                    </div>
                </div>
            </div>

        </form> --}}

        <div class="border-b border-gray-900/10 pb-12">
        
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="cpf" class="block text-sm font-medium leading-6 text-gray-900">CPF</label>
                    <div class="mt-2">
                        <input placeholder="Digite o CPF" type="numer" id="cpf" name="cpf" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
      
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                    <div class="mt-2">
                    <input  placeholder="Digite o nome completo do colaborador" type="text" name="name" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
      
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900"> E-mail </label>
                    <div class="mt-2">
                        <input placeholder="Digite o e-mail" id="email" name="email" type="email" autocomplete="email" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="data_nascimento" class="block text-sm font-medium leading-6 text-gray-900"> Data de nascimento </label>
                    <div class="mt-2">
                        <input name="data_nascimento" type="date" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="data_admissao" class="block text-sm font-medium leading-6 text-gray-900"> Data de admissão </label>
                    <div class="mt-2">
                        <input name="data_admissao" type="date" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="cpf" class="block text-sm font-medium leading-6 text-gray-900"> Cargo </label>
                    <div class="mt-2">
                        <input placeholder="Selecione o cargo do colaborador" type="numer" id="cpf" name="cpf" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
      
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Função</label>
                    <div class="mt-2">
                    <input  placeholder="Selecione a função do colaborador" type="text" name="name" class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="data_rescisao" class="block text-sm font-medium leading-6 text-gray-900"> Data de rescisão </label>
                    <div class="mt-2">
                        <input name="data_rescisao" type="date" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                                        <!-- Dias da semana gerados dinamicamente pelo JavaScript -->
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <!-- Conteúdo gerado dinamicamente pelo JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <script src="{{ asset('js/criarTabelaHorarios.js') }}"></script>
  

@endsection