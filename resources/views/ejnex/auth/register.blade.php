@extends('layout.app')
@section('title', 'Autenticação')
{{-- @include('layout.navbar.navbar-site') --}}
@section('content')
    <div class="w-full h-screen flex items-center justify-center text-black">

        <div id="blue-div"
            class="w-full flex items-center justify-center text-white transition-transform
       duration-700">

            {{-- Formulario de cadastro --}}
            @livewire('form-register')

        </div>

        {{-- Tela azul com h1 de login / registro --}}
        <div id="informations-div"
            class="w-full bg-blue-black h-full flex items-center justify-center text-white transition-transform
        duration-700 z-10">
            <h1 class="text-3xl font-semibold text-white-color" id="infos-text">Login</h1>
        </div>


    </div>

@endsection
