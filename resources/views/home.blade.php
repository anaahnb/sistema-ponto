@extends('layouts.app')

@section('content')
    <div>
        @if($usuario->tipo_usuario === 'Colaborador')
            @include('registro')
        @endif
        @if($usuario->tipo_usuario === 'Administração')
            @include('usuarios.index')
        @endif
    </div>
@endsection