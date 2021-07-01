<x-app-layout>
    <x-doctors.hello></x-doctors.hello>

    <card-carousel-component />

    @push('scripts')
        <script src="{{ mix('js/cardCarousel.js') }}" defer></script>
    @endpush

</x-app-layout>
