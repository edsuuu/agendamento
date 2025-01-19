<nav
    class="w-full border-b border-b-blue-link bg-blue-black text-white flex flex-row justify-between px-10 items-center p-4"
    id="navbar">
    <div>
        @if(auth()->check())
            <h2><a href="{{ route('dashboard') }}">Logo</a></h2>
        @else
            <h2><a href="{{ route('home') }}">Logo</a></h2>
        @endif
    </div>
    <div class="flex flex-row list-none gap-4">
        <ul class="flex gap-7">
            <li><a href="" class="hover:underline font-medium">Soluções</a></li>
            <li><a href="" class="hover:underline font-medium">Recursos</a></li>
            <li><a href="" class="hover:underline font-medium">Planos</a></li>
        </ul>
    </div>
    @if(auth()->check())
        <div class="flex flex-row gap-2">
            @if(auth()->user()->role === 'costumer')
                @if(auth()->user()->business)
                    <h1><a href="{{ route('dashboard') }}">Dashboard</a></h1>
                    {{--                    <h1><a href="{{ route('business.complete-profile.google') }}">Complete seu Cadastro</a></h1>--}}
                    <h1>123123123</h1>
                @endif
            @elseif(auth()->user()->role === 'admin')
                <h1><a href="{{ route('admin.dashboard') }}">Dashboard</a></h1>
            @endif
            <a href="{{ route('logout') }}">Sair</a>
        </div>
    @else
        <div class="flex flex-row gap-4 items-center">
            <a href="{{ route('login') }}" class="hover:underline font-medium">Login</a>
            <button class="py-[5px] px-[17px] bg-blue-white rounded-[6px] font-medium active:scale-[0.97]" onclick="window.location='{{ route('register') }}'">
                Comece já
            </button>
        </div>
    @endif
</nav>

