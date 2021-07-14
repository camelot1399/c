@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div id="feedback_form" class="card p-40px" style="display:none;">
    <div class="card-body pt-0">
        <h4 class="widget-title mb-4">Оставить отзыв о <span class="text-gray-500">{{ $specialist->user->name . ' ' . $specialist->user->surname}}</span></h4>
        <form method="post" action="{{ route('feedback.store') }}">
            @csrf
            @if(Auth::check())
{{--                TODO: сделать красивый label как в записи на прием      --}}
                <input name="user_id" value="{{ Auth::user()->id }}" type="hidden">
                <p class="text-lg text-gray-700 mb-3">От: {{ Auth::user()->name . ' ' . Auth::user()->surname }}</p>
            @else
                <input name="name" placeholder="Ваше имя" type="text" class="mb-4 w-50 rounded-md shadow-sm border-gray-300 focus:border-grey-300 focus:ring focus:ring-grey-200 focus:ring-opacity-50">
                <input name="surname" placeholder="Ваша фимилия" type="text" class="mb-4 w-50 rounded-md shadow-sm border-gray-300 focus:border-grey-300 focus:ring focus:ring-grey-200 focus:ring-opacity-50">
            @endif
            <input name="specialist_id" value="{{ $specialist->id }}" type="hidden">
            <textarea name="body_text" placeholder="Напишите свой отзыв" class="w-50 rounded-md shadow-sm border-gray-300 focus:border-grey-300 focus:ring focus:ring-grey-200 focus:ring-opacity-50"></textarea>
            <input type="submit" class="apt-btn mt-8" value="Оставить отзыв">
        </form>
    </div>
</div>

@push('style')
    <style>
        .apt-btn {
            background-color: #4890cb;
            color: #fff;
            border-radius: 4px;
            display: block;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 1px;
            padding: 10px 20px;
            text-align: center;
            text-transform: uppercase;
        }

        .apt-btn:hover, .apt-btn:focus {
            background-color: #4184bb;
            border-color: #4184bb;
            color: #fff;
        }
    </style>

@endpush
