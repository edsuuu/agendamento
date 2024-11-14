<nav class="w-full border-b border-b-blue-link bg-blue-black text-white flex flex-row justify-between px-10 items-center text-white-color p-4"
     id="navbar">
    <div>
        <h2><a href="{{ route('home') }}">Logo</a></h2>
    </div>
    <div class="flex flex-row list-none gap-4">
        <ul class="flex gap-7">
            <li><a href="" class="hover:underline font-medium">Soluções</a></li>
            <li><a href="" class="hover:underline font-medium">Recursos</a></li>
            <li><a href="" class="hover:underline font-medium">Planos</a></li>
        </ul>
    </div>
    <div class="flex flex-row gap-4 items-center">
        <a href="{{ route('auth') }}" class="hover:underline font-medium">Login</a>
        <button class="py-[5px] px-[17px] bg-blue-white rounded-[6px] font-medium active:scale-[0.97]" onclick="redirectAuthRegister()">
            Comece já
        </button>
    </div>
</nav>

<script>
    // para mudar a div correta na tela de auth
    function redirectAuthRegister() {
        window.location.href = "{{ route('auth', ['register' => 'true']) }}";
    }
</script>
