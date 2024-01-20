@extends('layouts.app')

@section('content')
    <body class="h-full">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"> Iniciar sessão na sua conta </h2>
            </div>
        
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">E-mail</label>
                        <div class="mt-2">
                            <input placeholder="Digite o seu email" id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
            
                    <div>
                        <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
                                <div class="text-sm">
                                    <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Esqueceu sua senha?</a>
                                </div>
                        </div>
                        <div class="mt-2">
                            <input placeholder="Digite a sua senha" id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
            
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> Entrar </button>
                    </div>
                </form>
        
                <p class="mt-10 text-center text-sm text-gray-500">
                    Ainda não tem conta?
                    <a href="{{ route('register') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Registre-se!</a>
                </p>
            </div>
        </div>
    </body>
@endsection
