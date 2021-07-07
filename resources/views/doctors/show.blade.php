<x-app-layout>
    <div class="py-40px">
        <div class="p-15px" style="min-height: 444px;">
            <div class="mx-15px mx-auto max-w-540 sm:max-w-720 md:max-w-1140">
                <x-doctor.card :specialist="$specialist"></x-doctor.card>
                <x-doctor.about></x-doctor.about>
            </div>
        </div>
    </div>
</x-app-layout>
