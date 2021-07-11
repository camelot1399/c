<x-app-layout>
    <div class="py-40px">
        <div class="p-15px" style="min-height: 444px;">
            <div class="mx-15px mx-auto max-w-540 sm:max-w-720 md:max-w-1140">
                <x-doctor.card :specialist="$specialist"/>
                @if(!isset(Auth::user()->specialist->id) || $specialist->id != Auth::user()->specialist->id)
                    <x-feedback.feedback :specialist="$specialist"/>
                @endif
                <x-feedback.feedback-show :specialist="$specialist" :feedback="$feedback"/>
                <x-doctor.about/>

            </div>
        </div>
    </div>
</x-app-layout>
