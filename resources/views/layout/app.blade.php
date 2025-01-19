<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-behavior: smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>

{{-- Modais importa aq  e scripts  --}}

@if(Auth::check())
    <div class="w-full h-full flex flex-row border border-black">
        <x-navbar-auth>
            <main>
                {{ $slot }}
            </main>
        </x-navbar-auth>
    </div>
@else
    <div>
        <x-navbar-guest />

        <main>
            {{ $slot }}
        </main>
    </div>
@endif

@livewireScripts
</body>
<script>
    window.addEventListener('load', function () {
        const navbar = document.getElementById('navbar');
        const content = document.getElementById('content');
        const navbarHeight = navbar.offsetHeight;

        const screenHeight = window.innerHeight;
        const adjustedHeight = screenHeight - navbarHeight;

        content.style.height = `${adjustedHeight}px`;
    });

    // const input = document.querySelector("#phone");
    // window.intlTelInput(input, {
    //     initialCountry: "br",
    //     loadUtilsOnInit: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.7.0/build/js/utils.js",
    // });

</script>
</html>
