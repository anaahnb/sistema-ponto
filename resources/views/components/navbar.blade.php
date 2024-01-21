<div class="min-h-full">
    <nav class="bg-gray-800 py-4">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Logo">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('usuarios.index') }}" class="text-gray-300 hover:bg-gray-700 rounded-md px-3 py-2 text-sm font-medium">Usuários</a>
                            <a href="{{ route('colaboradores.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Colaboradores</a>
                            <a href="{{ route('feriados.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Feriados</a>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="relative">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="rounded-md block px-5 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                    Sair
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                        <span class="sr-only">Abrir menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('usuarios.index') }}" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Usuários</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Colaboradores</a>
                <a href="{{ route('feriados.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Feriados</a>
            </div>

            
                <div class="pt-4 pb-3 border-t border-gray-700">
                    
                    <div class="mt-3 space-y-1">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="rounded-md block px-5 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                Sair
                            </button>
                        </form>                    
                    </div>
                </div>
           
        </div>
    </nav>
</div>

<script src="{{ asset('js/navbar.js') }}"></script>