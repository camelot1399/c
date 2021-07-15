<template>
    <div class="slickList" :class="{'overflow' : slider}">
        <div id="slickListSearchBlock" v-if="!slider">
            <form action="#" class="slickList__form" @click.prevent="">
                <button class="filterBlock__btn">
                    <i class="fas fa-brain" @click="filterBlock.status = !filterBlock.status"></i>
                </button>
                <input
                    type="text"
                    name="slickList__searchInput"
                    class="slickList__searchInput"
                    placeholder="Фамилия, имя, отчество"
                    data-control="inputText"
                    v-model="filterBlock.searchInput"
                >
                <!-- <button type="submit" name="slickList__searchBtn" class="slickSlide__btn">Search</button> -->
            </form>
        </div>

        <div class="slickList__body">
            <div class="slickList__filterBlock" v-if="filterBlock.status">

                <div class="slickList__filterBlock_body">
                    <div class="slickList__filterBlock_title">
                        <h4>Filter search</h4>
                    </div>

                    <div class="slickList__filterBlock_item">
                        <div class="slickList__filterBlock_header">Категория</div>
                        <ul class="slickList__filterBlock_ul">
                            <li v-for="category in filterBlock.categories" :key="category.id" >
                                <input
                                    type="checkbox"
                                    :name="'slickList__filterBlock_name_' + category.id"
                                    :id="'slickList__filterBlock_name_' + category.id"
                                    hidden=""
                                    @click="checkedcategories(category)"
                                >
                                <label :for="'slickList__filterBlock_name_' + category.id">{{ category.name }}</label>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
            <div>
                <div class="slickTrack">
                    <div :class="[slider ? 'slickTrack__visible' : 'slickTrack__visibleList']">
                        <div class="slickSlide" v-for="(item, i) in filteredSpecialists" :key="i" >

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
                                        <div v-if="item.rating <= i">
                                            <i class="fas fa-star noActive_star"></i>
                                        </div>
                                        <div v-else>
                                            <i class="fas fa-star active_star"></i>
                                        </div>
        <!--                                <i class="fas fa-star active_star"></i>-->
                                    </div>
                                    <span>(17) </span>
                                </div>

                                <div class="slickSlide__speciality">{{ item.category.name }}</div>
                                <div class="slickSlide__coast"><i class="far fa-money-bill-alt"></i> {{ item.price | toFix }}</div>

                            </div>
                            <div class="slickSlide__buttons">
                                <a :href="routedoctor.replace('xxx', item.id)" class="slickSlide__btn btn">Подробнее</a>
                                <a :href="routeshedule.replace('xxx', item.id)" class="slickSlide__btn btn slickSlide__btn_bookNow">Записаться</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div v-else>Ни одного специалиста не найдено :(</div> -->
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
import toFix from '../../filters/toFix';

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
            sortedSpecialists: [],
            status: 1,
            form: {
                searchInput: null
            },
            filterBlock: {
                status: true,
                searchInput: "",
                categories: [],
                checkedCategories: []
            }
        }
    },
    filters: {
        toFix
    },
    watch: {
        'filterBlock.searchInput': function() {
            this.filtered();
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
        filtered() {
            this.sortedSpecialists = [];

            if (this.filterBlock.checkedCategories.length) {
                this.filterBlock.checkedCategories.forEach(el => {
                    this.addToSortedSpecialists(el);
                })
            }

            if (this.filterBlock.searchInput.length >= 3) {
                this.filterSortedSpecialistsBySearchInput();
            }
        },
        filterSortedSpecialistsBySearchInput() {
            let input = this.filterBlock.searchInput;
            let result = this.sortedSpecialists;
            // проверяем, если у нас есть пробелы в искомой фразе, создаем массив filterArray из слов
            if (input.includes(" ")) {
                let filterArray = input.split(' ');

                filterArray.forEach(el => {
                    if (el !== "" && el.length > 3) {
                        this.searchForMatches(el, result);
                    }
                })
            } else {
                this.searchForMatches(input, result);
            }
        },
        searchForMatches(filter, result) {
            let regexp = new RegExp(filter, 'i');

            this.specialists.forEach(el => {
                if (regexp.exec(el.user.name) || regexp.exec(el.user.surname) || regexp.exec(el.user.second_name)) {
                    if (result.indexOf(el) === -1) result.push(el);
                }
            });

            return result;
        },
        addToSortedSpecialists(filter) {
            this.specialists.map(el => {
                if (filter.id === el.category.id) {
                    this.sortedSpecialists.push(el);
                }
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
        getCategoriesList() {
            let categories = this.specialists.map(el => el.category);

            let list = [];
            categories.forEach(el => {
                if (!list.some(e => e.name === el.name)) {
                    list.push({
                        id: el.id,
                        name: el.name
                    })
                }
            })

            this.filterBlock.categories = list;
        },
        checkedcategories(category) {
            if (!this.filterBlock.checkedCategories.some(el => el.id === category.id)) {
                this.filterBlock.checkedCategories.push(category);
            } else {
                this.filterBlock.checkedCategories.splice(this.filterBlock.checkedCategories.indexOf(category), 1);
            }

            this.filtered();
        }
    },
    computed: {
        filteredSpecialists() {
            if (this.sortedSpecialists.length) {
                return this.sortedSpecialists;
            }

            return this.specialists;
        }
    },
    mounted() {
        this.specialists = this.doctors;
        this.specialistsFilter = this.doctors;
        this.initSlider();
        this.getCategoriesList();
    }

}
</script>
<style>
    #slickListSearchBlock {
        margin-bottom: 10px;
    }
    .slickList__form {
        display: flex;
        align-items: center;
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

    .slickList__body {
        display: flex;
        justify-content: space-between;
    }

    .slickList__filterBlock {
        min-width: 200px;
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

    .filterBlock__btn {
        font-size: 30px;
        color: #4890cb;
        transition: opacity 0.8s;
    }

    .filterBlock__btn:hover {
        font-size: 30px;
        color: #4890cb;
        opacity: 0.8;
    }

    label {
    color: #000;
    cursor: default;
    font-weight: normal;
    line-height: 20px;
    padding: 10px 0;
    vertical-align: middle;
    cursor: pointer;
    }

    label:before {
    content: " ";
    color: #000;
    display: inline-block;
    /* шрифт Awesome*/
    font: 20px/30px FontAwesome;
    margin-right: 15px;
    position: relative;
    text-align: center;
    text-indent: 0px;
    width: 30px;
    height: 30px;
    background: #FFF;
    border: 1px solid #e3e3e3;
    border-image: initial;
    vertical-align: middle;
    }

    input:checked + label:before {
    /* глифон - галочка */
    content: "\2714";
    color: #4890cb;
    }

    input:disabled + label:before {
    background: #eee;
    color: #aaa;
    }

    .slickList__filterBlock_body {
        background: white;
    }

    .slickList__filterBlock_title {
        border-bottom: 1px solid #f0f0f0;
        padding: 10px;
    }

    .slickList__filterBlock_item {
        padding: 10px;
    }


</style>
