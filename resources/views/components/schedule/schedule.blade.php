@push('style')
    <style type="text/css">
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }
        /*box*/

        .daterangepicker {
            position: absolute;
            color: inherit;
            background-color: #fff;
            width: 150px;
            border-radius: 4px;
            border: 1px solid #ddd;
            max-width: none;
            padding: 0;
            margin-top: 7px;
            top: 100px;
            left: 20px;
            z-index: 3001;
            font-size: 15px;
            line-height: 1em;
        }
        .daterangepicker::before {
            position: absolute;
            display: inline-block;
            border-bottom-color: rgba(0, 0, 0, 0.2);
            content: '';
        }

        .daterangepicker::before {
            left: 6px;
            top: -6px;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #fff;
            border-left: 6px solid transparent;
        }

        .daterangepicker .ranges ul {
            list-style: none;
            margin: 0 auto;
            padding: 0;
        }
        .daterangepicker .ranges li {
            font-size: 12px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .daterangepicker .ranges li:hover {
            background-color: #eee;
        }
        .daterangepicker .ranges li.active {
            background-color: #08c;
            color: #fff;
        }
        /*-----------------
            2. Bootstrap Classes
        -----------------------*/

        .btn-white {
            background-color: #fff;
            border: 1px solid #ccc;
            color: #272b41;
        }

        .btn-primary {
            background-color: #66c323;
            border: 1px solid #66c323;
        }
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary.active,
        .btn-primary:active {
            background-color: #5cb31e;
            border: 1px solid #5cb31e;
        }

        .btn-primary.active:focus,
        .btn-primary.active:hover,
        .btn-primary.focus:active,
        .btn-primary:active:focus,
        .btn-primary:active:hover {
            background-color: #5cb31e;
            border: 1px solid #5cb31e;
        }

        .btn-primary.active:not(:disabled):not(.disabled),
        .btn-primary:active:not(:disabled):not(.disabled) {
            background-color: #5cb31e;
            border-color: #5cb31e;
            color: #fff;
        }

        .btn-primary.active:focus:not(:disabled):not(.disabled),
        .btn-primary:active:focus:not(:disabled):not(.disabled) {
            box-shadow: unset;
        }

        /*-----------------
            3. Booking_Schedule
        -----------------------*/
        .schedule-widget {
            border-radius: 4px;
            min-height: 100px;
        }
        .schedule-header h4 {
            font-size: 18px;
            font-weight: 600;
            margin: 3px 0 0;
        }
        .schedule-header {
            border-bottom: 1px solid #f0f0f0;
            border-radius: 4px 4px 0 0;
            padding: 10px 20px;
        }
        .day-slot ul {
            float: left;
            list-style: none;
            margin-bottom: 0;
            margin-left: -5px;
            margin-right: -5px;
            padding: 0;
            position: relative;
            width: 100%;
        }
        .day-slot li {
            float: left;
            padding-left: 5px;
            padding-right: 5px;
            text-align: center;
            width: 14.28%;
        }
        .day-slot li span {
            display: block;
            font-size: 18px;
            text-transform: uppercase;
        }
        .day-slot li span.slot-date {
            display: block;
            color: #757575;
            font-size: 14px;
        }
        .day-slot li small.slot-year {
            color: #757575;
            font-size: 14px;
        }
        .day-slot li.left-arrow {
            left: 0;
            padding: 0;
            position: absolute;
            text-align: center;
            top: 50%;
            width: 20px !important;
            transform: translateY(-50%);
        }
        .day-slot li.right-arrow {
            right: -11px;
            padding: 0;
            position: absolute;
            text-align: center;
            top: 50%;
            width: 20px !important;
            transform: translateY(-50%);
        }
        .schedule-cont {
            padding: 20px;
        }
        .time-slot ul {
            list-style: none;
            margin-right: -5px;
            margin-left: -5px;
            margin-bottom: 0;
            padding: 0;
        }
        .time-slot li {
            float: left;
            padding-left: 5px;
            padding-right: 5px;
            width: 14.28%;
        }
        .time-slot li .timing {
            background-color: #e9e9e9;
            border: 1px solid #e9e9e9;
            border-radius: 3px;
            color: #757575;
            display: block;
            font-size: 14px;
            margin-bottom: 10px;
            padding: 5px 5px;
            text-align: center;
            position: relative;
        }
        .time-slot li .timing:hover {
            background-color: #fff;
        }
        .time-slot li .timing:last-child {
            margin-bottom: 0;
        }
        .time-slot li .timing.selected {
            background-color: #4890cb;
            border: 1px solid #4890cb;
            color: #fff;
        }
        .time-slot li .timing.selected::before {
            color: #fff;
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-size: 12px;
            font-weight: 900;
            position: absolute;
            right: 6px;
            top: 6px;
        }
        .submit-section.proceed-btn {
            margin: 0 0 30px;
        }
        .text-right {
            text-align: right!important;
        }
        .booking-btn {
            font-weight: bold;
            height: 45px;
            width: 180px;
            padding: 8px 0 0 0;
        }
        @media (min-width: 1400px) {
            .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
                max-width: 1320px;
            }
        }
    </style>
@endpush
<div class="row pt-40px">
    <div class="col-12 col-sm-4 col-md-6">
        <h4 class="mb-1">05 Июля 2021</h4>
        <p class="text-muted">Понедельник</p>
    </div>
    <div class="col-12 col-sm-8 col-md-6 text-right">
        <div id="daterangepicker" class="bookingrange btn btn-white btn-sm mb-3" >
            <i class="far fa-calendar-alt mr-2"></i>
            <span>Июль 05, 2021 - Июль 11, 2021</span>
            <i class="fas fa-chevron-down ml-2"></i>
        </div>
    </div>
</div>
<div id="daterangepicker_box" class="daterangepicker" style="display: none;">
    <div class="ranges">
        <ul>
            <li>Today</li>
            <li>Yesterday</li>
            <li class="active" >Last 7 Days</li>
            <li>Last 30 Days</li>
            <li>This Month</li>
            <li>Last Month</li>
        </ul>
    </div>
</div>
<!-- Schedule Widget -->
<div class="card booking-schedule schedule-widget">

    <!-- Schedule Header -->
    <div class="schedule-header">
        <div class="row">
            <div class="col-md-12">

                <!-- Day Slot -->
                <div class="day-slot">
                    <ul>
                        <li class="left-arrow">
                            <a href="#">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </li>
                        <li>
                            <span>Пнд</span>
                            <span class="slot-date">05 Июл <small
                                    class="slot-year">2021</small></span>
                        </li>
                        <li>
                            <span>Втр</span>
                            <span class="slot-date">06 Июл <small
                                    class="slot-year">2021</small></span>
                        </li>
                        <li>
                            <span>Срд</span>
                            <span class="slot-date">07 Июл <small
                                    class="slot-year">2021</small></span>
                        </li>
                        <li>
                            <span>Чтв</span>
                            <span class="slot-date">08 Июл <small
                                    class="slot-year">2021</small></span>
                        </li>
                        <li>
                            <span>Птн</span>
                            <span class="slot-date">09 Июл <small
                                    class="slot-year">2021</small></span>
                        </li>
                        <li>
                            <span>Сбт</span>
                            <span class="slot-date">10 Июл <small
                                    class="slot-year">2021</small></span>
                        </li>
                        <li>
                            <span>Вск</span>
                            <span class="slot-date">11 Июл <small
                                    class="slot-year">2021</small></span>
                        </li>
                        <li class="right-arrow">
                            <a href="#">
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /Day Slot -->

            </div>
        </div>
    </div>
    <!-- /Schedule Header -->

    <!-- Schedule Content -->
    <div class="schedule-cont">
        <div class="row">
            <div class="col-md-12">

                <!-- Time Slot -->
                <div class="time-slot">
                    <ul class="clearfix">
                        <li>
                            <a class="timing" href="#">
                                <span>9:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>10:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>11:00</span>
                            </a>
                        </li>
                        <li>
                            <a class="timing" href="#">
                                <span>9:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>10:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>11:00</span>
                            </a>
                        </li>
                        <li>
                            <a class="timing" href="#">
                                <span>9:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>10:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>11:00</span>
                            </a>
                        </li>
                        <li>
                            <a class="timing" href="#">
                                <span>9:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>10:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>11:00</span>
                            </a>
                        </li>
                        <li>
                            <a class="timing" href="#">
                                <span>9:00</span>
                            </a>
                            <a class="timing selected" href="#">
                                <span>10:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>11:00</span>
                            </a>
                        </li>
                        <li>
                            <a class="timing" href="#">
                                <span>9:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>10:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>11:00</span>
                            </a>
                        </li>
                        <li>
                            <a class="timing" href="#">
                                <span>9:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>10:00</span>
                            </a>
                            <a class="timing" href="#">
                                <span>11:00</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /Time Slot -->

            </div>
        </div>
    </div>
    <!-- /Schedule Content -->

</div>
<!-- /Schedule Widget -->

<!-- Submit Section -->
<div class="submit-section proceed-btn text-right">
    <a href="#" onclick="alert('Вы успешно записаны к доктору!')" class="btn btn-primary submit-btn booking-btn">Записаться</a>
</div>
<!-- /Submit Section -->
