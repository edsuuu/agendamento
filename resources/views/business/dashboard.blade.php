<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@livewireScripts
<div>
    @if(auth()->check())
        <div>
            <h1>Logado</h1>
            <a href="{{ route('logout') }}">Sair</a>
        </div>
    @endif

    <h1 class="text-red-600">Business dashboard</h1>

{{--    @livewire('auth-forms')--}}
</div>
</body>
</html>
