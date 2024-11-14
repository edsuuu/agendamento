<div class="card-plan bg-blue-black" data-prices="{{ json_encode($prices) }}">
    <h2 class="">{{ $title }}</h2>
    <p class="">{{ $description }}</p>

    <div class="price">
        R$ {{ number_format($prices['monthly'], 2, ',', '.') }}
    </div>
</div>
