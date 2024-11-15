<div>
    <h1>Dasboard Cliente</h1>
    @if(auth()->check())
        <div>
            <h1>Logado</h1>
            <a href="{{ route('logout') }}">Sair</a>
        </div>
    @endif
</div>
