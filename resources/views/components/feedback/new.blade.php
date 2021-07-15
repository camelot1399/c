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
{{--            TODO: Заменить на Font Awesome 5, пока блок ниже работает на 4--}}
            <div class="form-group mb-4 w-50 rounded-md shadow-sm border-gray-300 focus:border-grey-300 focus:ring focus:ring-grey-200 focus:ring-opacity-50">
{{--                <label>Ваша оценка</label>--}}
                <div class="star-rating">
                    <div class="star-rating__wrap">
                        <input class="star-rating__input" id="star-5" type="radio" name="value" value="5">
                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-5" title="Отлично"></label>
                        <input class="star-rating__input" id="star-4" type="radio" name="value" value="4">
                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-4" title="Хорошо"></label>
                        <input class="star-rating__input" id="star-3" type="radio" name="value" value="3">
                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-3" title="Удовлетворительно"></label>
                        <input class="star-rating__input" id="star-2" type="radio" name="value" value="2">
                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-2" title="Плохо"></label>
                        <input class="star-rating__input" id="star-1" type="radio" name="value" value="1">
                        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-1" title="Ужасно"></label>
                    </div>
                </div>
            </div>
            <textarea name="body_text" placeholder="Напишите свой отзыв" class="w-50 rounded-md shadow-sm border-gray-300 focus:border-grey-300 focus:ring focus:ring-grey-200 focus:ring-opacity-50"></textarea>
            <input type="submit" class="apt-btn mt-8" value="Оставить отзыв">
        </form>
    </div>
</div>

@push('style')
{{--    TODO: Удалить ссылку на FA4--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        .star-rating{
            font-size: 0;
        }
        .star-rating__wrap{
            display: inline-block;
            font-size: 1rem;
        }
        .star-rating__wrap:after{
            content: "";
            display: table;
            clear: both;
        }
        .star-rating__ico{
            float: right;
            padding-left: 2px;
            cursor: pointer;
            color: #FFB300;
        }
        .star-rating__ico:last-child{
            padding-left: 0;
        }
        .star-rating__input{
            display: none;
        }
        .star-rating__ico:hover:before,
        .star-rating__ico:hover ~ .star-rating__ico:before,
        .star-rating__input:checked ~ .star-rating__ico:before
        {
            content: "\f005";
        }
    </style>

@endpush
