
<div class="card p-40px">
    <div class="card-body pt-0">
        <h4 class="widget-title mb-4">Отзывы о <span
                class="text-gray-500">{{ $specialist->user->name . ' ' . $specialist->user->surname}}</span></h4>
        @if($feedback->count() != 0)
            @foreach($feedback as $oneFeedback)
                <p class="border-top pt-4 text-xs text-gray-400">{{ $oneFeedback->created_at }}</p>
                <p class="text-gray-700">От: {{ $oneFeedback->user_id != null ? $oneFeedback->user->name . ' ' . $oneFeedback->user->surname : $oneFeedback->name . ' ' . $oneFeedback->surname}}</p>
                <p class="text-gray-700">{{ $oneFeedback->body_text }}</p>
            @endforeach
        @else
            <p class="mt-5 text-gray-500 text-xl-center">Здесь пока нет ни одного отзыва, напишите свой :)</p>
        @endif
    </div>
</div>
