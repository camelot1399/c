<x-app-layout>
    <h1>Доктора</h1>
    <ul>
        <li><a href="/">Главная страничка</a></li>
        <li><a href="/doctors">Доктора</a></li>
        <li><a href="/schedule">Расписание</a></li>
    </ul>
    <div class="main-wrapper">
        <div class="content" style="min-height: 444px;">
            <div class="container">
                <x-doctor.about></x-doctor.about>
            </div>
        </div>
    </div>
{{--    @include("doctors/about")--}}
</x-app-layout>
