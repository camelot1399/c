<x-app-layout>
    <div class="py-40px">
        <div class="p-15px" style="min-height: 444px;">
            <div class="mx-15px mx-auto max-w-540 sm:max-w-720 md:max-w-1140">
                <x-doctor.card :specialist="$specialist"/>
                @if($feedbackUser != null)
                    <x-feedback.new :specialist="$specialist" :feedbackUser="$feedbackUser"/>
                @endif
                <x-feedback.show :specialist="$specialist"/>
                <x-doctor.about/>
            </div>
        </div>
    </div>
</x-app-layout>
