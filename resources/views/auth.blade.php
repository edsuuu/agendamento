@extends('site.layout.layout')
@section('title', 'Autenticação')

@section('content')
    <div class="w-full h-screen flex items-center justify-center text-black" id="content">

        {{-- Tela azul com h1 de login / registro --}}
        <div id="informations-div" class="w-full bg-blue-black h-full flex items-center justify-center text-white transition-transform
        duration-700 z-10">
            <h1 class="text-3xl font-semibold text-white-color" id="infos-text">Login</h1>
        </div>

        <div id="blue-div" class="w-full flex items-center justify-center text-white transition-transform
            duration-700">
            {{-- formulario de login--}}
            <div id="login-form" class="border border-border-gray w-[500px] rounded-[7px] p-4 flex flex-col">
                <div class="flex flex-col justify-center mt-5 mb-5">
                    <h1 class="text-2xl font-semibold text-center text-black">
                        Acessar painel
                    </h1>
                    <div class="flex flex-col justify-center text-error-message text-center">
                        @if(session('erro'))
                            <div class="alert alert-error">
                                {{ session('erro') }}
                            </div>
                        @endif
                    </div>
                </div>

                <form id="login-form-id" action="{{ route('login') }}" method="post" class="flex flex-col justify-between">
                    @csrf
                    <div class="flex flex-col gap-7 ">
                        <div class="input-container">
                            <input type="email" name="email" placeholder="email@email.com">
                            <label for="email">E-mail</label>
                        </div>


                        <div class="input-container">
                            <input type="password" name="password" id="lpasswd" placeholder="********">
                            <label for="password">Senha</label>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between pl-0.5 pr-0.5 my-4">
                        <div class="">
                            <label for="remember" class="flex flex-row items-center gap-2 cursor-pointer text-[14px] text-black">
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
                    <p class="text-black">
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
            <div id="register-form" class="border border-border-gray w-[550px] rounded-[7px] p-4 hidden">
                <div class="flex flex-col mb-3">
                    <h1 class="text-center font-medium text-2xl my-4">Criar sua conta</h1>
                    <div class="flex flex-row justify-around">
                        <p>Cadastrar como : </p>
                        <p>
                            <span id="comercio-option" class="font-medium text-blue-black cursor-pointer hover:underline">Comercio</span>
                            |
                            <span id="usuario-option" class="font-medium text-blue-black cursor-pointer hover:underline">Usuário</span>
                        </p>
                    </div>

                   <div class="flex flex-col justify-center text-error-message text-center">
                       @if ($errors->any())
                           @foreach ($errors->all() as $error)
                               {{ $error }}
                           @endforeach
                       @endif
                   </div>
                </div>


                <form id="register-costumer-form-id" action="{{ route('business.register') }}" method="post"
                      class="flex flex-col justify-between">
                    @csrf
                    <div class="flex flex-col gap-3 ">

                        <div class="flex flex-row gap-4">
                            <div class="input-container">
                                <input type="text" name="firstname" id="firstname" placeholder="Seu nome">
                                <label for="firstname">Nome *</label>
                            </div>
                            <div class="input-container">
                                <input type="text" name="lastname" id="lastname" placeholder="Seu sobrenome">
                                <label for="lastname">Sobrenome *</label>
                            </div>
                        </div>

                        <div class="input-container">
                            <input type="email" name="email" id="email" placeholder="seuemail@email.com">
                            <label for="email">E-mail *</label>
                        </div>

                        <div id="business-name-container" class="input-container">
                            <input type="text" name="businessname" id="businessname" placeholder="Nome do seu comercio">
                            <label for="businessname">Nome do comercio *</label>
                        </div>

                        <div id="phone-container" class="input-container">
                            <input type="text" name="phone" id="phone" placeholder="(00) 98765-4321" maxlength="15">
                            <label for="phone">Número de celular *</label>
                        </div>

                        <div class="input-container">
                            <input type="password" name="password" id="password-register" placeholder="********" maxlength="50">
                            <label for="password">Senha *</label>
                        </div>
                        <div class="input-container">
                            <input type="password" name="password_confirmation" id="check-passoword-register" placeholder="********"
                                   maxlength="50">
                            <label for="password_confirmation">Confirmar senha</label>
                        </div>

                        <div id="segment-container" class="w-full flex flex-col gap-2">
                            @livewire('segment-form')
                        </div>

                        <button type="submitå"
                                class="bg-blue-button w-full font-bold text-white-color rounded-[5px] py-2 transition-all duration-200 active:scale-[0.98]">
                            Criar Conta
                        </button>
                    </div>
                </form>
                <div class="flex flex-row justify-center my-3 text-[15px]">
                    <p>
                        Já possui uma conta ? <span class="text-blue-link underline cursor-pointer" onclick="swapDivs()">Fazer Login</span>
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
                            <span class="text-sm text-[#1f1f1f]">Criar sua conta com o Google</span>
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

        let currentType = 'comercio';

        // troca de comercio para usuario
        document.addEventListener('DOMContentLoaded', function () {
            const comercioOption = document.getElementById('comercio-option');
            const usuarioOption = document.getElementById('usuario-option');
            const registerForm = document.getElementById('register-costumer-form-id');
            const businessNameContainer = document.getElementById('business-name-container');
            const segmentContainer = document.getElementById('segment-container');
            const segmentTypeContainer = document.getElementById('segmentTypeContainer');
            const segmentSelect = document.getElementById('segment');
            const segmentTypeSelect = document.getElementById('segmentType');

            function setComercioForm() {
                registerForm.action = '{{ route('business.register') }}';
                businessNameContainer.style.display = 'block';
                segmentContainer.style.display = 'block';
                segmentTypeContainer.style.display = 'none';
                segmentTypeSelect.innerHTML = '<option value="" disabled selected>Selecione um tipo de segmento</option>';
                currentType = 'comercio';

                comercioOption.classList.add('underline');
                usuarioOption.classList.remove('underline');
            }

            function setUsuarioForm() {
                registerForm.action = '{{ route('user.register') }}';
                businessNameContainer.style.display = 'none';
                segmentContainer.style.display = 'none';
                segmentTypeContainer.style.display = 'none';
                segmentTypeSelect.innerHTML = '<option value="" disabled selected>Selecione um tipo de segmento</option>';
                currentType = 'usuario';

                comercioOption.classList.remove('underline');
                usuarioOption.classList.add('underline');
            }

            setComercioForm();

            comercioOption.addEventListener('click', function () {
                setComercioForm();
            });

            usuarioOption.addEventListener('click', function () {
                setUsuarioForm();
            });

        });


        document.getElementById('phone').addEventListener('input', function (event) {
            let phone = event.target.value;

            phone = phone.replace(/\D/g, '');

            if (phone.length <= 2) {
                phone = phone.replace(/^(\d{0,2})/, '($1');
            } else if (phone.length <= 7) {
                phone = phone.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
            } else {
                phone = phone.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
            }

            event.target.value = phone;
        });

        document.getElementById('register-costumer-form-id').addEventListener('submit', function (event) {
            event.preventDefault();

            const firstname = document.getElementById('firstname');
            const lastname = document.getElementById('lastname');
            const email = document.getElementById('email');
            const businessname = document.getElementById('businessname');
            const phone = document.getElementById('phone');
            const password = document.getElementById('password-register');
            const passwordConfirmation = document.getElementById('check-passoword-register');
            const segment = document.getElementById('segment');
            const segmentType = document.getElementById('segmentType');

            let isValid = true;

            function showError(input, message) {
                const inputContainer = input.parentElement;
                const errorMessage = inputContainer.querySelector('.error-message');

                inputContainer.classList.add('border-error-message');

                if (errorMessage) {
                    console.log('Mensagem de erro atualizada');
                    errorMessage.textContent = message;
                    errorMessage.style.display = 'block';
                } else {
                    const newErrorMessage = document.createElement('span');
                    newErrorMessage.classList.add('text-error-message', 'text-xs', 'mt-1', 'error-message', 'pl-1');
                    newErrorMessage.textContent = message;
                    inputContainer.appendChild(newErrorMessage);
                }
            }

            function clearError(input) {
                const inputContainer = input.parentElement;
                inputContainer.classList.remove('border-error-message');
                const errorMessage = inputContainer.querySelector('.error-message');
                if (errorMessage) {
                    errorMessage.remove();
                }
            }

            let isBusiness = currentType === 'comercio';

            if (firstname.value.trim() === '') {
                showError(firstname, 'O nome é obrigatório.');
                isValid = false;
            } else {
                clearError(firstname);
            }

            if (lastname.value.trim() === '') {
                showError(lastname, 'O sobrenome é obrigatório.');
                isValid = false;
            } else {
                clearError(lastname);
            }

            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(email.value)) {
                showError(email, 'E-mail inválido.');
                isValid = false;
            } else {
                clearError(email);
            }

            if (isBusiness && businessname && businessname.value.trim() === '') {
                showError(businessname, 'O nome do comércio é obrigatório.');
                isValid = false;
            } else {
                clearError(businessname);
            }

            const phonePattern = /^\(\d{2}\)\s\d{5}-\d{4}$/;
            if (!phonePattern.test(phone.value)) {
                showError(phone, 'Número de celular inválido. Exemplo: (11) 98765-4321');
                isValid = false;
            } else {
                clearError(phone);
            }

            if (password.value.trim() === '') {
                showError(password, 'A senha é obrigatória.');
                isValid = false;
            } else {
                clearError(password);
            }

            if (passwordConfirmation.value.trim() === '') {
                showError(passwordConfirmation, 'A confirmação de senha é obrigatória.');
                isValid = false;
            } else if (password.value !== passwordConfirmation.value) {
                showError(passwordConfirmation, 'As senhas não coincidem.');
                isValid = false;
            } else {
                clearError(passwordConfirmation);
            }



            if (isBusiness) {
                if (segment.value === '') {
                    showError(segment, 'Por favor, selecione um segmento.');
                    isValid = false;
                } else {
                    clearError(segment);
                }

                if (segmentType.value === '') {
                    showError(segmentType, 'Por favor, selecione um tipo de segmento.');
                    isValid = false;
                } else {
                    clearError(segmentType);
                }
            }

            if (isValid) {
                this.submit();
            }
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


        // formulario de login
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
                emailContainer.classList.add('border-error-message');
                if (!emailContainer.querySelector('.error-message')) {
                    const emailError = document.createElement('span');
                    emailError.classList.add('text-error-message', 'text-xs', 'mt-1', 'error-message', 'pl-1');
                    emailError.textContent = 'Por favor, insira um e-mail.';
                    emailContainer.appendChild(emailError);
                }
                isValid = false;
            }

            if (password.value.trim() === '') {
                passwordContainer.classList.add('border-error-message');
                if (!passwordContainer.querySelector('.error-message')) {
                    const passwordError = document.createElement('span');
                    passwordError.classList.add('text-error-message', 'text-xs', 'mt-1', 'error-message', 'pl-1');
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


            const form = document.getElementById('register-costumer-form-id');
            form.querySelectorAll('input').forEach(input => {
                input.addEventListener('input', removeErrorOnInput);
            });

            form.querySelector('select[name="segment"]').addEventListener('input', removeErrorOnInput);
            form.querySelector('select[name="segmentType"]').addEventListener('input', removeErrorOnInput);
        });

    </script>
@endsection
