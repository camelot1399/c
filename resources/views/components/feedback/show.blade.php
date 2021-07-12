<?php
/**
 * @var Specialist $specialist
 */

use App\Models\Specialist;

?>
<div class="card p-40px">
    <div class="card-body pt-0">
        <h4 class="widget-title mb-4">Отзывы о <span
                class="text-gray-500">{{ $specialist->getNameAndSurname()}}</span></h4>
        @if($specialist->feedbacks->count() != 0)
            @foreach($specialist->feedbacks as $oneFeedback)
                <?php
                /**
                 * @var \App\Models\Feedback $oneFeedback
                 */
                ?>
                <p class="border-top pt-4 text-xs text-gray-400">{{ $oneFeedback->created_at }}</p>
                <p class="text-gray-700">От: {{ $oneFeedback->getNameAndSurname() }}</p>
                <p class="text-gray-700">{{ $oneFeedback->body_text }}</p>
            @endforeach
        @else
            <p class="mt-5 text-gray-500 text-xl-center">Здесь пока нет ни одного отзыва, напишите свой :)</p>
        @endif
    </div>
</div>
