<template>
    <div class="slickList">
        <div id="slickListSearchBlock">
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
                    <cardComponent
                        v-for="(item, i) in filteredSpecialists" :key="i"
                        :item="item"
                        :routedoctor="routedoctor"
                        :routeshedule="routeshedule"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import cardComponent from '../doctor/cardComponent.vue'
export default {
    name: 'specialistsList',
    props: {
        doctors: Array,
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
            filterBlock: {
                status: true,
                searchInput: "",
                categories: [],
                checkedCategories: []
            }
        }
    },
    components: {
        cardComponent
    },
    watch: {
        'filterBlock.searchInput': function() {
            this.filtered();
        }
    },
    methods: {
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
        this.getCategoriesList();
    }
}
</script>
<style>
    .slickList {
        position: relative;
        padding: 10px;
    }

    .slickList__body {
        display: flex;
        justify-content: space-between;
    }
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
    .slickList__filterBlock {
        min-width: 200px;
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

    .slickNavigation__right:hover {
        background: #4890cb;
        color: white;
    }

    .slickNavigation__hide {
        display: none;
    }

    .active_star {
        color: #f4c150;
    }

    .noActive_star {
        color: #dedfe0;
    }

    .slickTrack {
        display: flex;
        flex-wrap: wrap;
    }
</style>
