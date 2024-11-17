
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
