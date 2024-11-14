@extends('site.layout.layout')
@section('title', 'Autenticação')

@section('content')
    <div class="w-full h-screen flex items-center justify-center" id="content">

        <div id="informations-div" class="w-full bg-blue-black h-full flex items-center justify-center text-white transition-transform
        duration-700 z-10">
            <h1 class="text-3xl font-semibold text-white-color" id="infos-text">Login</h1>

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

                <form id="login-form-id" action="/teste" method="post" class="flex flex-col justify-between">
                    <div class="flex flex-col gap-7 ">
                        <div class="input-container">
                            <input type="email" name="email" id="email" placeholder=" ">
                            <label for="email">E-mail</label>
                        </div>


                        <div class="input-container">
                            <input type="password" name="password" placeholder=" ">
                            <label for="password">Senha</label>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between pl-0.5 pr-0.5 my-4">
                        <div class="">
                            <label for="remember" class="flex flex-row items-center gap-2 cursor-pointer text-[14px] ">
                                <input type="checkbox" name="remember" id="remember">
                                Manter conectado
                            </label>
                        </div>
                        <div>
                            <a href="#" class="underline text-blue-link text-[15px]">Esqueceu a senha ?</a>
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-button w-full font-bold text-white-color rounded-[5px] py-2 transition-all duration-200
                    active:scale-[0.98]">Entrar
                    </button>

                </form>
                <div class="flex flex-row justify-center my-4 text-[15px]">
                    <p>
                        Não tem uma conta ? <span class="text-blue-link underline cursor-pointer" onclick="swapDivs()">Cadastre-se</span>
                    </p>
                </div>
                <div class="flex flex-row justify-center">
                    <button class="flex items-center justify-center bg-white border border-[#747775] rounded-[20px] px-3 py-2
                    text-[#1f1f1f] text-sm font-roboto cursor-pointer transition-all duration-200 hover:bg-[#f6f6f6]
                    hover:border-[#747775] active:scale-[0.97] max-w-[400px] min-w-[min-content]">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-[20px] h-[20px]">
                                    <path fill="#EA4335"
                                          d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                                    <path fill="#4285F4"
                                          d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                                    <path fill="#FBBC05"
                                          d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                                    <path fill="#34A853"
                                          d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                                    <path fill="none" d="M0 0h48v48H0z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-[#1f1f1f]">Fazer login com o Google</span>
                        </div>
                    </button>
                </div>
            </div>


            {{-- Formulario de cadastro --}}
            <div id="register-form" class="border border-border-gray w-[500px] rounded-[7px] p-4 flex flex-col hidden">
                <div>
                    <h1>Criar sua conta</h1>

                    <p>Cadastrar como : </p>
                    <p>Comercio | Usuário </p>
                </div>

                <form action="/register" method="post" class="flex flex-col justify-between">
                    <div class="flex flex-col gap-7 ">
                        <div class="input-container">
                            <input type="email" name="email" id="email" placeholder=" ">
                            <label for="email">E-mail</label>
                        </div>

                        <div class="input-container">
                            <input type="password" name="password" placeholder=" ">
                            <label for="password">Senha</label>
                        </div>
                        <div class="input-container">
                            <input type="password" name="password" placeholder=" ">
                            <label for="password">Confirmar senha</label>
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-button w-full font-bold text-white-color rounded-[5px] py-2 transition-all duration-200
                    active:scale-[0.98]">Criar Conta
                    </button>

                </form>

                <div class="flex flex-row justify-center my-4 text-[15px]">
                    <p>
                        Já possui uma conta ? <span class="text-blue-link underline cursor-pointer" onclick="swapDivs()">Fazer login</span>
                    </p>
                </div>

                <div class="flex flex-row justify-center">
                    <button class="flex items-center justify-center bg-white border border-[#747775] rounded-[20px] px-3 py-2
                    text-[#1f1f1f] text-sm font-roboto cursor-pointer transition-all duration-200 hover:bg-[#f6f6f6] hover:border-[#747775] active:scale-95 max-w-[400px] min-w-[min-content]">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-[20px] h-[20px]">
                                    <path fill="#EA4335"
                                          d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                                    <path fill="#4285F4"
                                          d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                                    <path fill="#FBBC05"
                                          d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                                    <path fill="#34A853"
                                          d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                                    <path fill="none" d="M0 0h48v48H0z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-[#1f1f1f]">Criar conta com o Google</span>
                        </div>
                    </button>
                </div>
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


        const form = document.getElementById('login-form-id');
        const email = form.querySelector('input[name="email"]');
        const password = form.querySelector('input[name="password"]');
        const submitButton = form.querySelector('button[type="submit"]');

        function validateLoginForm(event) {
            event.preventDefault();

            const emailContainer = email.parentElement;
            const passwordContainer = password.parentElement;

            emailContainer.classList.remove('border-error-message');
            emailContainer.querySelector('.error-message')?.remove();
            passwordContainer.classList.remove('border-error-message');
            passwordContainer.querySelector('.error-message')?.remove();

            let isValid = true;

            if (email.value.trim() === '') {
                emailContainer.classList.add('border-red-500');
                if (!emailContainer.querySelector('.error-message')) {
                    const emailError = document.createElement('span');
                    emailError.classList.add('text-error-message', 'text-xs', 'mt-1', 'error-message');
                    emailError.textContent = 'Por favor, insira um e-mail.';
                    emailContainer.appendChild(emailError);
                }
                isValid = false;
            }

            if (password.value.trim() === '') {
                passwordContainer.classList.add('border-error-message');
                if (!passwordContainer.querySelector('.error-message')) {
                    const passwordError = document.createElement('span');
                    passwordError.classList.add('text-error-message', 'text-xs', 'mt-1', 'error-message');
                    passwordError.textContent = 'Por favor, insira uma senha.';
                    passwordContainer.appendChild(passwordError);
                }
                isValid = false;
            }

            if (isValid) {
                form.submit();
            }
        }

        function removeErrorOnInput(event) {
            const inputField = event.target;
            const inputContainer = inputField.parentElement;

            inputContainer.classList.remove('border-red-500');
            const errorMessage = inputContainer.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.remove();
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            loginForm.addEventListener('submit', validateLoginForm);


            email.addEventListener('input', removeErrorOnInput);
            password.addEventListener('input', removeErrorOnInput);
        });

    </script>
@endsection
