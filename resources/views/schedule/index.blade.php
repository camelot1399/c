<x-app-layout>
    <h1>Расписание</h1>
    <ul>
        <li><a href="/">Главная страничка</a></li>
        <li><a href="/doctors">Доктора</a></li>
        <li><a href="/schedule">Расписание</a></li>
    </ul>

<div class="main-wrapper">
    <div class="content" style="min-height: 444px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <x-schedule.card-mini></x-schedule.card-mini>
                    <x-schedule.schedule></x-schedule.schedule>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
