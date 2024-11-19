<div id="register-form" class=" w-[550px] px-4">
    <div class="flex flex-col justify-center mt-3 mb-3">
        <h1 class="text-2xl font-bold text-black">
            Crie sua conta
        </h1>
        <div>
            @if ($errors->has('google'))
                <span class="text-red-500 text-[15px] font-medium">{{ $errors->first('google') }}</span>
            @endif

            @if ($errors->has('error'))
                <div class="alert alert-danger">
                    <span class="text-red-500 text-[15px] font-medium">{{ $errors->first('error') }}</span>
                </div>
            @endif
        </div>
    </div>
    <form method="POST" wire:submit.prevent="submitRegister" class="flex flex-col gap-2">
        @csrf
        <div class="flex flex-col gap-3">
            <div class="text-black flex flex-col gap-0.5">
                <p class="text-gray-700 text-[14px] font-medium">Seu nome *</p>
                <input type="text" name="firstName" placeholder="Nome do responsável"
                    wire:model.defer="formData.firstName" wire:change="handleChange('formData.firstName')"
                    class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link invalid:border-red-500"
                    minlength="3" maxlength="30">
                @error('formData.firstName')
                    <span class="text-red-500 text-[13px]">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-black flex flex-col gap-0.5">
                <p class="text-gray-700 text-[14px] font-medium">Seu sobrenome</p>
                <input type="text" name="lastName" placeholder="Sobrenome do responsável"
                    wire:model.defer="formData.lastName" wire:change="handleChange('formData.lastName')"
                    class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link invalid:border-red-500"
                    minlength="3" maxlength="30">
                @error('formData.lastName')
                    <span class="text-red-500 text-[13px]">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-black flex flex-col gap-0.5">
                <p class="text-gray-700 text-[14px] font-medium">Nome do seu negócio *</p>
                <input type="text" name="nameBusiness" placeholder="Como você chama seu negócio"
                    wire:model.defer="formData.nameBusiness" wire:change="handleChange('formData.nameBusiness')"
                    class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link invalid:border-red-500"
                    minlength="3" maxlength="30">
                @error('formData.nameBusiness')
                    <span class="text-red-500 text-[13px]">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-black flex flex-col gap-0.5">
                <p class="text-gray-700 text-[14px] font-medium">Celular *</p>

                <input type="tel" id="phone" wire:model.defer="formData.phone"
                    wire:change="handleChange('formData.phone')"
                    class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link invalid:border-red-500 w-full"
                    placeholder="(99) 99999-9999" maxlength="15" />
                @error('formData.phone')
                    <span class="text-red-500 text-[13px]">{{ $message }}</span>
                @enderror


            </div>
            <div class="text-black flex flex-col gap-0.5">
                <p class="text-gray-700 text-[14px] font-medium">Seu e-mail *</p>
                <input type="email" name="email" placeholder="Digite o seu email" wire:model.defer="formData.email"
                    wire:change="handleChange('formData.email')"
                    class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link invalid:border-red-500">
                @error('formData.email')
                    <span class="text-red-500 text-[13px]">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-black flex flex-col gap-0.5">
                <p class="text-gray-700 text-[14px] font-medium">Senha *</p>
                <input type="password" name="password" placeholder="Digite a sua senha"
                    wire:model.defer="formData.password" wire:change="handleChange('formData.password')"
                    class="border border-gray-300 outline-none p-2 pl-3 rounded focus:border-blue-link invalid:border-red-500">
                @error('formData.password')
                    <span class="text-red-500 text-[13px]">{{ $message }}</span>
                @enderror
            </div>
            <button onclick="manterFixado()" type="submit"
                class="bg-blue-button w-full font-bold text-white-color rounded-[5px] py-2 transition-all duration-200
                    active:scale-[0.99]">Criar
                minha conta
            </button>
        </div>

    </form>
    <div class="flex flex-col gap-3 mt-4">
        <div class="flex flex-row justify-center text-[15px]">
            <p class="text-gray-700 font-medium ">
                Já possuí uma conta? <span class="text-blue-link font-medium cursor-pointer hover:underline"
                    onclick="window.location = '{{ route('login') }}'">Fazer Login</span>
            </p>
        </div>
        <div class="flex flex-row items-center w-full px-2 my-1">
            <span class="border-b border-[#747775c7] flex-grow"></span>
            <p class="text-gray-700 mx-4">Ou</p>
            <span class="border-b border-[#747775a9] flex-grow"></span>
        </div>

        <div class="flex flex-row justify-center">
            <button
                class="w-full flex justify-center bg-[#f6f6f6] border border-[#747775a9] rounded-[7px] px-3 py-2
                            text-[#1f1f1f] text-sm font-roboto cursor-pointer transition-all duration-200
                            hover:border-[#74777567] active:scale-[0.97]"
                onclick="activeSpinnerAndRedirectRegister()">
                <div class="flex items-center">
                    <div class="mr-2">
                        <span id="logo-google-register">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-[20px] h-[20px]">
                                <path fill="#EA4335"
                                    d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z" />
                                <path fill="#4285F4"
                                    d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z" />
                                <path fill="#FBBC05"
                                    d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z" />
                                <path fill="#34A853"
                                    d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z" />
                                <path fill="none" d="M0 0h48v48H0z" />
                            </svg>
                        </span>
                        <span class="hidden" id="spinner-register">
                            @include('components.spinner-google')
                        </span>
                    </div>
                    <span class="text-sm text-[#1f1f1f] flex flex-row gap-2 items-center">
                        Criar sua conta com o Google
                    </span>
                </div>
            </button>
        </div>
        <div class="mt-3">
            <p class="text-gray-700 font-medium text-[13.5px] text-center">
                Ao continuar, você concorda com os <span
                    class="text-blue-link hover:underline cursor-pointer">Termos</span> e <span
                    class="text-blue-link hover:underline cursor-pointer">Política de
                    Privacidade</span>.
            </p>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
<script>
    function activeSpinnerAndRedirectRegister() {
        document.getElementById('logo-google-register').classList.add('hidden')
        document.getElementById('spinner-register').classList.remove('hidden');
        setTimeout(() => {
            window.location = '{{ route('google', ['business' => 'true']) }}';
        }, 1000);
    }

    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        initialCountry: "br",
        loadUtilsOnInit: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.7.0/build/js/utils.js",
    });

    document.getElementById('phone').addEventListener('input', function(event) {
        let phone = event.target.value;

        phone = phone.replace(/\D/g, '');

        if (phone.length === 0) {
            event.target.value = '';
        } else if (phone.length <= 2) {
            phone = phone.replace(/^(\d{0,2})/, '($1');
        } else if (phone.length <= 7) {
            phone = phone.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
        } else {
            phone = phone.replace(/^(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
        }

        event.target.value = phone;
    });
</script>
