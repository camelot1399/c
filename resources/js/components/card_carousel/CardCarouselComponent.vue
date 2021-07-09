<template>
    <div class="slickList" :class="{slider: 'overflow'}">
        <div id="slickListSearchBlock" v-if="!slider">
            <form action="#" class="slickList__form">
                <input
                    type="text"
                    name="slickList__searchInput"
                    class="slickList__searchInput"
                    placeholder="Я ищу по фамилии"
                    data-control="inputText"
                    v-model="form.searchInput"
                >
                <button type="submit" name="slickList__searchBtn" class="slickSlide__btn">Search</button>
            </form>
        </div>
        <div class="slickTrack">
            <div :class="[slider ? 'slickTrack__visible' : 'slickTrack__visibleList']">
                <div class="slickSlide" v-for="(item, i) in specialistsFilter" :key="i">

                    <div class="slickSlide__imgBlock">
                        <img class="slickSlide__img" :src="item.photo" :alt="item.user.name">
                    </div>
                    <div class="slickSlide__content">
                        <div class="slickSlide__header">
                            <h3 class="slickSlide__h3">{{item.user.surname+' '+item.user.name+' '+item.user.second_name}}</h3>
                            <span v-if="status === 1">
                                <i class="fas fa-check-circle slickSlide__statusOk"></i>
                            </span>
                            <span v-else>
                                <i class="fas fa-check-circle slickSlide__statusNotOk"></i>
                            </span>
                        </div>
                        <div class="slickSlide__rating">
                            <div v-for="(start, i) in 5" :key="i">
<!--                                <div v-if="item.rating <= i">-->
<!--                                    <i class="fas fa-star noActive_star"></i>-->
<!--                                </div>-->
<!--                                <div v-else>-->
<!--                                    <i class="fas fa-star active_star"></i>-->
<!--                                </div>-->
                                <i class="fas fa-star active_star"></i>
                            </div>
                            <span>(17)</span>
                        </div>

                        <div class="slickSlide__speciality">{{item.category.name}}</div>
                        <div class="slickSlide__coast"><i class="far fa-money-bill-alt"></i> от {{ item.price }} руб.</div>

                    </div>
                    <div class="slickSlide__buttons">
                        <a :href="routedoctor.replace('xxx', item.id)" class="slickSlide__btn btn">Подробнее</a>
                        <a :href="routeshedule.replace('xxx', item.id)" class="slickSlide__btn btn slickSlide__btn_bookNow">Записаться</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slickNavigation" v-if="slider">
            <button class="slickNavigation__left" data-control="left">
                <i class="fas fa-chevron-left" data-control="left"></i>
            </button>
            <button class="slickNavigation__right" data-control="right">
                <i class="fas fa-chevron-right" data-control="right"></i>
            </button>
        </div>
    </div>
</template>
<script>
export default {
    name: 'CardCarouselComponent',
    props: {
        doctors: Array,
        slider: Boolean,
        routedoctor: {type: String},
        routeshedule: {type: String},
    },
    data() {
        return {
            offset: 0,
            currentItem: 1,
            widthItem: 280,
            sliderWidth: 0,
            currentOffsetBlock: 0,
            marginBlock: 10,
            specialists: [],
            specialistsFilter: [],
            status: 1,
            form: {
                searchInput: null
            }
        }
    },
    methods: {
        initSlider() {
            this.sliderWidth = this.specialistsFilter.length * this.widthItem;
            this.currentOffsetBlock = document.querySelector('.slickList').offsetWidth;

            if (this.slider) {
                let slickNavigation = document.querySelector('.slickNavigation');
                slickNavigation.addEventListener('click', (e) => {
                    let control = e.target.dataset.control;

                    if (control !== 'left' && control !== 'right') {
                        return null
                    }

                    if (control === 'left') {
                        this.slideToLeft();
                    } else {
                        this.slideToRight();
                    }

                })
            }
        },
        initFormSearch() {
            console.log('init form search');
            let input = document.querySelector('.slickList__searchInput');
            input.addEventListener('keyup', (el) => {
                if (this.form.searchInput.length >= 3) {
                    this.getSpecialistsFilter(this.form.searchInput);
                } else {
                    this.getSpecialistsFilter();
                }
            });
        },
        getSpecialistsFilter(filter) {
            if (!filter) {
                return this.specialistsFilter = this.specialists;
            }

            // проверяем, если у нас есть пробелы в искомой фразе, создаем массив filterArray из слов
            if (filter.includes(' ')) {
                let filterArray = filter.split(' ');
                console.log(filterArray);
            }

            let regexp = new RegExp(filter, 'i');
            let result = [];

            this.specialists.forEach(el => {
                // console.log(`filter = ${filter}`);
                // console.log(el.user);
                if (regexp.exec(el.user.name) || regexp.exec(el.user.surname) || regexp.exec(el.user.second_name)) {
                    result.push(el);
                }
            });

            this.specialistsFilter = result;

        },
        checkAvailability(arr, val) {
            return arr.some(function(arrVal) {
                return val === arrVal;
            });
        },
        slideToLeft() {
            let slickNavigation__left = document.querySelector('.slickNavigation__left');
            let slickNavigation__right = document.querySelector('.slickNavigation__right');

            slickNavigation__right.classList.remove('slickNavigation__hide');

            if (this.currentItem === 1) {
                return null;
            }

            if (this.currentItem === 2) {
                slickNavigation__left.classList.add('slickNavigation__hide');
                this.offset = -20;
            } else {
                this.offset = this.offset + this.widthItem;
            }

            this.currentItem--;
            if (this.offset === 0) {
                return null;
            }

            let slickTrack = document.querySelector('.slickTrack');

            this.currentOffsetBlock = this.currentOffsetBlock - this.widthItem;
            slickTrack.style.transform = `translateX(${this.offset}px)`;

        },
        slideToRight() {
            let slickList = document.querySelector('.slickList');
            let rightEl = Math.floor(slickList.offsetWidth / (this.specialistsFilter.length * this.widthItem) * 10);
            let slickNavigation__left = document.querySelector('.slickNavigation__left');
            let slickNavigation__right = document.querySelector('.slickNavigation__right');

            slickNavigation__left.classList.remove('slickNavigation__hide');

            if ( (this.currentItem + rightEl - 2) > (this.specialistsFilter.length)) {
                return null;
            }

            this.currentItem++;

            if ( (this.currentItem + rightEl - 2) === (this.specialistsFilter.length)) {
                slickNavigation__right.classList.add('slickNavigation__hide');
                this.offset = slickList.offsetWidth - this.sliderWidth - (this.marginBlock * this.specialistsFilter.length);
            } else {
                this.offset = this.offset - this.widthItem;
            }

            let slickTrack = document.querySelector('.slickTrack');
            let widthViewBox = slickList.offsetWidth;
            this.currentOffsetBlock = this.currentOffsetBlock + this.widthItem;
            slickTrack.style.transform = `translateX(${this.offset}px)`;
        },
    },
    mounted() {
        this.specialists = this.doctors;
        this.specialistsFilter = this.doctors;
        this.initSlider();
        this.initFormSearch();
    }

}
</script>
<style>
    #slickListSearchBlock {
        margin-bottom: 10px;
    }
    .slickList__form {
        display: flex;
    }
    button[name="slickList__searchBtn"] {
        border-radius: 0 10px 10px 0;
    }

    input[name="slickList__searchInput"] {
        display: flex;
        flex: 1;
        border-radius: 10px 0 0 10px;
    }

    .slickList__searchInput:active {
        outline: 0;
        outline-offset: 0;
    }
    .slickSlide {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 10px;
        width: 280px;
        box-sizing: border-box;
        box-shadow: 2px 2px 13px rgb(0 0 0 / 10%);
        background: white;
        margin: 0 5px 10px 5px;
    }

    .slickList {
        position: relative;
        padding: 10px;
    }

    .overflow {
        overflow: hidden;
    }

    .slickSlide__header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .slickTrack__visible {
        display: flex;
        flex-wrap: nowrap;
    }

    .slickTrack__visibleList {
        display: flex;
        flex-wrap: wrap;
    }

    .slickSlide__imgBlock {
        position: relative;
        overflow: hidden;
    }
    .slickSlide__img {
        transition: all 0.6s;
    }

    .slickSlide__img:hover {
        transform: scale(1.2);
    }

    .slickSlide__btn {
        color: #4890cb;
        font-size: 13px;
        border: 2px solid #4890cb;
        text-align: center;
        display: block;
        font-weight: 500;
        padding: 6px;
        border-radius: 10px;
        transition: all 0.6s;
    }

    .slickSlide__buttons {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .slickSlide__btn:hover {
        background: #4890cb;
        color: white;
    }

    .slickSlide__btn_bookNow {
        background: #4890cb;
        color: white;
        margin-left: 10px;
    }

    .slickSlide__btn_bookNow:hover {
        background: #4184bb;
    }

    .slickTrack {
        position: relative;
        padding: 0 10px;
        transition: all 0.6s;
    }

    .slickNavigation__left {
        position: absolute;
        top: calc(50% - 50px);
        left: 0;
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50px;
        box-shadow: 1px 6px 14px rgb(0 0 0 / 20%);
        transition: background 0.6s;
    }

    .slickNavigation__left:hover {
        background: #4890cb;
        color: white;
    }

    .slickNavigation__right {
        position: absolute;
        top: calc(50% - 50px);
        right: 0;
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50px;
        box-shadow: 1px 6px 14px rgb(0 0 0 / 20%);
        transition: background 0.6s;
    }

    .slickNavigation__right:hover {
        background: #4890cb;
        color: white;
    }

    .slickNavigation__hide {
        display: none;
    }

    .slickSlide__content {
        color: #757575;
        font-size: 13px;
        margin-top: 10px;
    }

    .slickSlide__rating {
        display: flex;
        margin-top: 10px;
    }

    .slickSlide__speciality {
        margin-top: 10px;
    }

    .slickSlide__coast {
        margin-top: 10px;
    }

    .slickSlide__statusOk {
        color: green;
    }

    .slickSlide__statusNotOk {
        color: red;
    }

    .active_star {
        color: #f4c150;
    }

    .noActive_star {
        color: #dedfe0;
    }

</style>
