@push('style')
    <style type="text/css">
        img {
            vertical-align: middle;
            border-style: none;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .d-inline-block {
            display: inline-block!important;
        }
        input, button, a {
            transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            -ms-transition: all 0.4s ease;
            -webkit-transition: all 0.4s ease;
        }

        .doctor-widget {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
        .doctor-widget .doc-name {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 3px;
        }
        .doctor-widget .rating i {
            font-size: 14px;
        }
        .doctor-widget .average-rating {
            font-size: 14px;
            font-weight: 500;
        }
        .doc-info-left {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }
        .doctor-img {
            -ms-flex: 0 0 150px;
            flex: 0 0 150px;
            margin-right: 20px;
            width: 150px;
        }
        .doctor-img img {
            border-radius: 5px;
        }
        .doc-speciality {
            font-size: 14px;
            color: #757575;
            margin-bottom: 15px;
        }
        .doc-department {
            color: #4498dc;
            font-size: 14px;
            margin-bottom: 8px;
        }
        .doc-department img {
            width: 19px;
            display: inline-block;
            margin-right: 10px;
        }
        .rating {
            list-style: none;
            margin: 0 0 7px;
            padding: 0;
            width: 100%;
        }
        .rating i.filled {
            color: #f4c150;
        }
        .rating i {
            color: #dedfe0;
        }
        .fa-star:before {
            content: "\f005";
        }
        .clinic-details {
            margin-bottom: 15px;
        }
        .doc-location {
            color: #757575;
            font-size: 14px;
            margin-bottom: 25px;
        }
        .fa-map-marker-alt:before {
            content: "\f3c5";
        }
        input, button, a {
            transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            -ms-transition: all 0.4s ease;
            -webkit-transition: all 0.4s ease;
        }
        .doc-location a {
            color: #66c323;
            font-weight: 500;
        }
        .clinic-services {
            color: #272b41;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            font-size: 13px;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .clinic-services span {
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-block;
            font-size: 12px;
            padding: 3px 10px;
        }

        .doc-info-right {
            margin-left: auto;
            -ms-flex: 0 0 205px;
            flex: 0 0 205px;
            max-width: 205px;
        }
        .clini-infos {
            margin-bottom: 15px;
        }
        .clini-infos ul {
            font-size: 14px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .clini-infos ul li {
            display: block;
            line-height: 30px;
            color: #4E4852;
        }
        .clini-infos ul li i {
            font-size: 15px;
            min-width: 30px;
        }
        .clinic-booking a {
            background-color: #fff;
            border: 2px solid #4890cb;
            border-radius: 4px;
            color: #4890cb;
            display: block;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 1px;
            padding: 10px 20px;
            text-align: center;
            text-transform: uppercase;
            width: 100%;
        }
        .clinic-booking a.apt-btn {
            background-color: #4890cb;
            color: #fff;
        }

    </style>
@endpush
}<div class="card">
    <div class="card-body">
        <div class="doctor-widget">
            <div class="doc-info-left">
                <div class="doctor-img">
                    <img src="img/doctors/1.png" class="img-fluid" alt="User Image">
                </div>
                <div class="doc-info-cont">
                    <h4 class="doc-name">Д-р. Николай Чавез</h4>
                    <p class="doc-speciality">BDS, MDS - Челюстно-лицевая хирургия</p>
                    <p class="doc-department"><img src="img/specialities/05.png" class="img-fluid" alt="Speciality">Дантист</p>
                    <div class="rating">
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star"></i>
                        <span class="d-inline-block average-rating">(35)</span>
                    </div>
                    <div class="clinic-details">
                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Нью-Йорк, США - <a href="javascript:void(0);">?Получить указания?</a></p>
                        {{--<ul class="clinic-gallery">
                            <li>
                                <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                    <img src="assets/img/features/feature-01.jpg" alt="Feature">
                                </a>
                            </li>
                            <li>
                                <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                    <img src="assets/img/features/feature-02.jpg" alt="Feature Image">
                                </a>
                            </li>
                            <li>
                                <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                    <img src="assets/img/features/feature-03.jpg" alt="Feature">
                                </a>
                            </li>
                            <li>
                                <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                    <img src="assets/img/features/feature-04.jpg" alt="Feature">
                                </a>
                            </li>
                        </ul>--}}
                    </div>
                    <div class="clinic-services">
                        <span>Dental Fillings</span>
                        <span>Teeth Whitneing</span>
                    </div>
                </div>
            </div>
            <div class="doc-info-right">
                <div class="clini-infos">
                    <ul>
                        <li><i class="far fa-thumbs-up"></i> 99%</li>
                        <li><i class="far fa-comment"></i> 35 отзывов</li>
                        <li><i class="fas fa-map-marker-alt"></i> Нью-Йорк, США</li>
                        <li><i class="far fa-money-bill-alt"></i> $100 за час </li>
                    </ul>
                </div>
                {{--<div class="doctor-action">
                    <a href="javascript:void(0)" class="btn btn-white fav-btn">
                        <i class="far fa-bookmark"></i>
                    </a>
                    <a href="chat.html" class="btn btn-white msg-btn">
                        <i class="far fa-comment-alt"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
                        <i class="fas fa-phone"></i>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
                        <i class="fas fa-video"></i>
                    </a>
                </div>--}}
                <div class="clinic-booking">
                    <a class="apt-btn" href="{{route('schedule.index')}}">Записаться</a>
                </div>
            </div>
        </div>
    </div>
</div>
