<x-app-layout>
    <x-doctors.hello></x-doctors.hello>
    <div class="bg-div-gray-200 p-80px">
        <card-carousel-component :doctors="{{ json_encode($doctors) }}"/>
    </div>
    @push('scripts')
        <script src="{{ mix('js/cardCarousel.js') }}" defer></script>
    @endpush

</x-app-layout>
