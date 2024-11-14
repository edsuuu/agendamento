@extends('site.layout.layout')
@section('title', 'Autenticação')

@section('content')
    <div class="w-full h-screen flex items-center justify-center" id="content">

        <div id="informations-div" class="w-full bg-blue-black h-full flex items-center justify-center text-white transition-transform
        duration-700 z-10">
            <h1 class="text-3xl font-semibold text-white-color" id="infos-text">Login</h1>

            <button onclick="swapDivs()" class="">
                Trocar
            </button>
        </div>

        <div id="blue-div" class="w-full flex items-center justify-center text-white transition-transform
            duration-700">
            {{-- formulario de login--}}
            <div id="login-form" class="border border-border-gray w-[500px] rounded-[7px] p-4 flex flex-col">
                <div class="flex flex-row justify-center mt-5 mb-5">
                    <h1 class="text-2xl font-semibold ">
                        Acessar painel
                    </h1>
                </div>

                <form action="" method="post" class="flex flex-col justify-between">
                    <div class="flex flex-col gap-7 ">
                        <div class="input-container">
                            <input type="email" name="email">
                            <label for="email">E-mail</label>
                        </div>

                        <div class="input-container">
                            <input type="password" name="password">
                            <label for="password">Senha</label>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between pl-0.5 pr-0.5 my-4">
                        <div class="flex flex-row gap-2">
                            <label for="remember" class="cursor-pointer">
                                <input type="checkbox" name="remember" id="remember">
                                Manter conectado
                            </label>
                        </div>
                        <div>
                            <a href="#" class="underline text-blue-link">Esqueceu a senha ?</a>
                        </div>
                    </div>

                    <button class="bg-blue-button w-full font-bold text-white-color rounded-[5px] py-2">Entrar</button>

                </form>
                <div class="flex flex-row justify-center my-4">
                    <p>
                        Não tem uma conta ? <span class="text-blue-link underline cursor-pointer" onclick="swapDivs()">Cadastre-se</span>
                    </p>
                </div>
                <div class="">
                    <button></button>
                </div>
            </div>


            {{-- Formulario de cadastro --}}
            <div id="register-form" class="border w-[700px] h-[700px] hidden">
                <div>
                    <h1>Registro</h1>
                </div>

                <form action="">
                    <h1>fomr</h1>
                </form>
            </div>

        </div>


    </div>

    <script>
        //calculo com a div do navbar
        window.addEventListener('load', function () {
            const navbar = document.getElementById('navbar');
            const content = document.getElementById('content');
            const navbarHeight = navbar.offsetHeight;

            const screenHeight = window.innerHeight;
            const adjustedHeight = screenHeight - navbarHeight;

            content.style.height = `${adjustedHeight}px`;
        });


        // alternancia das div coforme a url
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const infoText = document.getElementById('infos-text');
        const blueDiv = document.getElementById('blue-div');
        const infoDiv = document.getElementById('informations-div');

        const urlParams = new URLSearchParams(window.location.search);
        let swapped = urlParams.get('register') === 'true';

        function swapDivs() {

            if (!swapped) {
                blueDiv.style.transition = 'transform 0.7s ease';
                infoDiv.style.transition = 'transform 0.7s ease';
                blueDiv.style.transform = 'translateX(-100%)';
                infoDiv.style.transform = 'translateX(100%)';

                setTimeout(function () {
                    loginForm.style.display = "none";
                    registerForm.style.display = "block";

                    infoText.textContent = "Registro";
                }, 250);
            } else {
                blueDiv.style.transition = 'transform 0.7s ease';
                infoDiv.style.transition = 'transform 0.7s ease';

                blueDiv.style.transform = 'translateX(0)';
                infoDiv.style.transform = 'translateX(0)';

                setTimeout(function () {
                    loginForm.style.display = "block";
                    registerForm.style.display = "none";

                    infoText.textContent = "Login";
                }, 250);
            }

            swapped = !swapped;
        }

        window.addEventListener('load', function () {
            if (swapped) {
                blueDiv.style.transform = 'translateX(-100%)';
                infoDiv.style.transform = 'translateX(100%)';

                setTimeout(function () {
                    loginForm.style.display = "none";
                    registerForm.style.display = "block";
                    infoText.textContent = "Registro";
                }, 250);
            } else {
                blueDiv.style.transform = 'translateX(0)';
                infoDiv.style.transform = 'translateX(0)';

                setTimeout(function () {
                    loginForm.style.display = "block";
                    registerForm.style.display = "none";
                    infoText.textContent = "Login";
                }, 250);
            }
        });
    </script>
@endsection
