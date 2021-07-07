<x-app-layout>
<div class="main-wrapper">
    <div class="content" style="min-height: 444px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <x-schedule.card-mini :specialist="$specialist"></x-schedule.card-mini>
                    <x-schedule.schedule :specialist="$specialist"></x-schedule.schedule>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
