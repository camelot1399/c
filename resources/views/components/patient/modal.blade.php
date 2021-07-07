@push('scripts')
    <script>
        (function(){
            let modal = document.querySelector('.profile-modal-container');
            let closeButton = document.querySelector('.close');
            let modalTriggers = document.querySelectorAll('[data-trigger]');

            let isModalOpen = false;
            let pageYOffset = 0;

            let openModal = function() {
                pageYOffset = window.pageYOffset;
                modal.classList.add('is-open');
                isModalOpen = true;
            }

            let closeModal = function() {
                modal.classList.remove('is-open');
                isModalOpen = false;
            }

            let onScroll = function(e) {
                if (isModalOpen) {
                    e.preventDefault();
                    window.scrollTo(0, pageYOffset);
                }
            }

            modalTriggers.forEach(function(item) {
                item.addEventListener('click', openModal);
            })

            document.addEventListener('scroll', onScroll);

            closeButton.addEventListener('click', closeModal);
        })();

    </script>
@endpush
<div class="profile-modal-container close">
    <div class="profile-modal-content">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="javascript:void(0)">
                                <img class="rounded-circle" alt="User Image" src="">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">Иванов Иван</h4>
                            <h6 class="text-muted">johndoe@example.com</h6>
                            <div class="user-Location"><i class="fas fa-map-marker-alt"></i>Москва, Россия</div>
                            <div class="about-text">Болит зуб, опухшая щека, головная боль</div>
                        </div>
                    </div>
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Персональные данные</span>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">ФИО</p>
                                            <p class="col-sm-10">Иванов Иван Иванович</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Возраст</p>
                                            <p class="col-sm-10">29</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email</p>
                                            <p class="col-sm-10">johndoe@example.com</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Мобильный</p>
                                            <p class="col-sm-10">+7(999)999-99-99</p>
                                        </div>
{{--                                        <div class="row">--}}
{{--                                            <p class="col-sm-2 text-muted text-sm-right mb-0">Адрес</p>--}}
{{--                                            <p class="col-sm-10 mb-0">4663  Agriculture Lane,<br>--}}
{{--                                                Miami,<br>--}}
{{--                                                Florida - 33165,<br>--}}
{{--                                                United States.</p>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Personal Details -->
                    </div>
                    <!-- /Personal Details Tab -->
                </div>
            </div>
        </div>

    </div>
</div>
@push('style')
    <style>
    .profile-modal-container {
        pointer-events: none;
        opacity: 0;
        position: fixed;
        z-index: -1;
        left: 0;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100vw;
        height: 100vh;
        padding: 30px;
        background-color: rgba(0, 0, 0, 0);
        transition: opacity .3s, background-color .5s;
    }

    .is-open {
        opacity: 1;
        pointer-events: all;
        z-index: 1;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .profile-modal-content {
        overflow: auto;
        width: 100%;
        height: 100%;
        max-width: 790px;
        max-height: 400px;
        padding: 20px;
        background-color: #fff;
        border-radius: 3px;
    }
    .profile-header {
        background-color: #fff;
        border: 1px solid #f0f0f0;
        padding: 1.5rem;
    }
    .profile-header img {
        height: auto;
        max-width: 120px;
        width: 120px;
    }
    .profile-tab-cont {
        padding-top: 1.875rem;
    }
    .about-text {
        max-width: 500px;
    }
    </style>
@endpush

