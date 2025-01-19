@extends('layout.app')
@include('layout.navbar.navbar-site')
@section('title', 'Complete seu Perfil')
@section('content')

	<div class="w-full flex flex-row" id="content">
		<div class="bg-blue-black w-full flex flex-col justify-evenly">
			<div class="flex flex-col gap-4 justify-center items-center text-white">
				<div>
					<h1 class="text-3xl font-medium">Seja Bem vindo, {{ auth()->user()->first_name }} !</h1>
				</div>
				<div class="text-center">
					<p>
						Vamos completar o seu perfil para você começar atender seus clientes.
					</p>
					<p>
						E gerenciar seu negócio.
					</p>
				</div>
			</div>

			<div
					class="flex flex-col md:flex-row items-center justify-center max-w-full md:w-[500px] mx-auto space-y-4 md:space-y-0 md:space-x-4">
				<div class="flex flex-col items-center text-center gap-1">
                    <span
		                    class="flex items-center justify-center w-10 h-10 bg-white rounded-full dark:bg-blue-link shrink-0">
                        <svg class="w-4 h-4 text-blue-link dark:text-white" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 5.917 5.724 10.5 15 1.5"/>
                        </svg>
                    </span>
					<p class="text-[14px] leading-4 text-white">Criando sua conta</p>
				</div>
				<li class="flex w-full items-center text-blue-link dark:text-blue-link after:content-[''] after:w-full after:h-0.5 after:border-b after:border-blue-link after:border-2 after:inline-block dark:after:text-blue-link">
				</li>
				<div class="flex flex-col items-center text-center gap-1">
                    <span
		                    class="flex items-center justify-center w-10 h-10 bg-blue-link rounded-full  dark:bg-white shrink-0">
                        <svg class="w-5 h-5 text-gray-500 dark:text-blue-link" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
		                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                        </svg>
                    </span>
					<p class="text-[14px] leading-4 text-white">Completando seu perfil</p>
				</div>
			</div>

{{--			<div class="flex flex-row text-white justify-center items-center text-center"--}}
{{--			     onclick=" window.location = '{{ route('user.deleteUser')}}'">--}}
{{--				<p class="hover:underline cursor-pointer">Excluir sua conta ?</p>--}}
{{--			</div>--}}
		</div>
		<div class="w-full">
			@livewire('complete-profile-forms')
		</div>
	</div>

@endsection


<script>
    window.addEventListener('load', function () {
        const navbar = document.getElementById('navbar');
        const content = document.getElementById('content');
        const navbarHeight = navbar.offsetHeight;

        const screenHeight = window.innerHeight;
        const adjustedHeight = screenHeight - navbarHeight;

        content.style.height = `${adjustedHeight}px`;
    });
</script>
