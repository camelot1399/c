<x-app-layout>
    <h1>Главная страничка</h1>
    <ul class="block">
        <li><a href="/">Главная страничка</a></li>
        <li><a href="/doctors">Доктора</a></li>
        <li><a href="/schedule">Расписание</a></li>
    </ul>

    <card-carousel-component />

    @push('scripts')
        <script src="{{ mix('js/cardCarousel.js') }}" defer></script>
    @endpush

</x-app-layout>
