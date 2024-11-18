@extends('layout.app')
@section('title', 'Autenticação')
{{--@include('layout.navbar.navbar-site')--}}
@section('content')
    <div class="w-full h-screen flex items-center justify-center text-black">

        {{-- Tela azul com h1 de login / registro --}}
        <div id="informations-div" class="w-full bg-blue-black h-full flex items-center justify-center text-white transition-transform
        duration-700 z-10">
            <h1 class="text-3xl font-semibold text-white-color" id="infos-text">Login</h1>
        </div>

        <div id="blue-div" class="w-full flex items-center justify-center text-white transition-transform
            duration-700">

            {{-- formulario de login--}}
          
                @livewire('form-login')


            {{-- Formulario de cadastro --}}
            <div id="register-form" class="border border-border-gray w-[550px] rounded-[7px] p-4 hidden">
                <div class="flex flex-col mb-3">
                    <h1 class="text-center font-medium text-2xl my-4 text-black">Criar sua conta</h1>
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
                                <label for="lastname">Sobrenome </label>
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
                            <input type="password" name="password" id="password-register" placeholder="********"
                                   maxlength="50">
                            <label for="password">Senha *</label>
                        </div>
                        <div class="input-container">
                            <input type="password" name="password_confirmation" id="check-passoword-register"
                                   placeholder="********"
                                   maxlength="50">
                            <label for="password_confirmation">Confirmar senha</label>
                        </div>

                        <div id="segment-container" class="w-full flex flex-col gap-2">
                            @livewire('segment-form')
                        </div>

                        <button type="submit"
                                class="bg-blue-button w-full font-bold text-white-color rounded-[5px] py-2 transition-all duration-200 active:scale-[0.98]">
                            Criar Conta
                        </button>
                    </div>
                </form>
                <div class="flex flex-row justify-center my-3 text-[15px]">
                    <p class="text-black">
                        Já possui uma conta ? <span class="text-blue-link underline cursor-pointer"
                                                    onclick="swapDivs()">Fazer Login</span>
                    </p>
                </div>
                <div class="flex flex-row justify-center">
                    <button class="flex items-center justify-center bg-white border border-[#747775] rounded-[20px] px-3 py-2
                    text-[#1f1f1f] text-sm font-roboto cursor-pointer transition-all duration-200 hover:bg-[#f6f6f6]
                    hover:border-[#747775] active:scale-[0.97] max-w-[400px] min-w-[min-content]"
                            onclick="activeSpinnerAndRedirect()"
                    >
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
                            <span class="text-sm text-[#1f1f1f] flex flex-row gap-2 items-center">
                                Criar sua conta com o Google <span class="hidden" id="spinner">@include('components.spinner-google')</span>
                            </span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>

        function activeSpinnerAndRedirect() {
            document.getElementById('spinner').classList.remove('hidden');
            window.location = '{{ route('google', ['business' => 'true']) }}';
        }
        
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
                    newErrorMessage.classList.add('text-error-message', 'text-xs', 'mt-0', 'error-message', 'pl-1');
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

            if (businessname.value.trim() === '') {
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

            if (isValid) {
                this.submit();
            }
        });

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





