{{--@extends('site.layout.layout')--}}
@extends('site.layout.layout')
@section('title', 'Lading')
@section('content')

    {{--  Header --}}
    <div class="bg-blue-black h-screen" id="content">
        <div class="flex flex-row justify-around text-white-color">
            <div>
                <h1>
                    Sistema de Agendamento Completo
                </h1>
                <p>
                    Tenha o controle de todo seu negocio direto do seu celular ou computador,
                    com poucos cliques seus clientes estaram agendados.
                </p>

                <button>
                    Teste Gratuitamente
                </button>
            </div>
            <div>
                <img src="{{ asset('images/cell.png') }}" alt="cell">
            </div>
        </div>
    </div>

    {{--  Cards de informações  --}}

    <div>
        <div>
            <div>Card1</div>
            <div>Card2</div>
            <div>Card3</div>
            <div>Card4</div>
        </div>
        <div>
            <h1>Você no controle com poucos cliques</h1>
            <p>Invista em um ambiente personalizado para seu negócio.</p>

            <button>Veja mais...</button>
        </div>
    </div>

    {{--    mais uma section --}}
    <div class="border bg-white-opaco">
        <div class="w-full max-w-[1440px] mx-auto">
            <div class="flex flex-row justify-center">
                <h1 class="text-2xl font-medium">Nossos planos</h1>
            </div>

            <div>
                {{-- Botões para trocar o preço --}}
                <div class="flex flex-row justify-between items-center p-4">
                    <div>
                        <h1 class="text-2xl font-medium">Escolha o plano ideal para você</h1>
                    </div>
                    <div class="bg-blue-white p-1 rounded-[25px]">
                        <div class="transition-transform duration-300 ease-in-out absolute inset-0 bg-blue-black rounded-[20px] transform
                         scale-0"></div>
                        <button
                            class="price-toggle rounded-[20px] px-6 py-1.5 bg-blue-black text-white-color transition-all duration-300
                            ease-in-out"
                            data-price-type="monthly">Mensal
                        </button>
                        <button class="price-toggle rounded-[20px] px-6 py-1.5 text-white-color transition-all duration-300 ease-in-out"
                                data-price-type="semiannual">Semestral
                        </button>
                        <button class="price-toggle rounded-[20px] px-6 py-1.5 text-white-color transition-all duration-300 ease-in-out"
                                data-price-type="annual">Anual
                        </button>
                    </div>
                </div>

                {{-- Grid com todos os cards / planos --}}
                {{-- borda aqui nos cards--}}
                <div class="border m-auto w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($plans as $plan)
                            <x-site.card-plans :title="$plan['title']" :prices="$plan['prices']" :description="$plan['description']"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Fotter --}}

    <footer>
        <h1>Footer</h1>
    </footer>


    <script>
        // funcao para o primeiro container dps do nav para ajudar automaticamente
        window.addEventListener('load', function () {
            const navbar = document.getElementById('navbar');
            const content = document.getElementById('content');
            const navbarHeight = navbar.offsetHeight;

            const screenHeight = window.innerHeight;
            const adjustedHeight = screenHeight - navbarHeight;

            content.style.height = `${adjustedHeight}px`;
        });


        // funcao para poder mudar o preco dos cardss
        let selectedPriceType = 'monthly';

        const priceButtons = document.querySelectorAll('.price-toggle');
        const planElements = document.querySelectorAll('.card-plan');

        priceButtons.forEach(button => {
            button.addEventListener('click', function () {
                selectedPriceType = this.getAttribute('data-price-type');

                priceButtons.forEach((btn) => {
                    btn.classList.remove('bg-blue-black');
                    btn.classList.add('bg-blue-white');
                });

                // Aplica estilo no botão clicado
                this.classList.add('bg-blue-black');
                this.classList.remove('bg-blue-white');

                planElements.forEach(planElement => {
                    const priceElement = planElement.querySelector('.price');
                    const prices = JSON.parse(planElement.getAttribute('data-prices'));

                    priceElement.innerText = `R$ ${prices[selectedPriceType].toFixed(2).replace('.', ',')}`;
                });
            });
        });
    </script>
@endsection
