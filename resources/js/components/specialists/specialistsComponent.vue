<template>
    <div class="slickList">
        <div id="slickListSearchBlock">
            <form action="#" class="slickList__form" @click.prevent="">
                <button class="filterBlock__btn">
                    <i class="fas fa-brain" ></i>
                </button>
                <input
                    type="text"
                    name="slickList__searchInput"
                    class="slickList__searchInput"
                    placeholder="Поиск"
                    data-control="inputText"
                    v-model="searchString"
                >
            </form>
        </div>

        <div class="slickList__body">
            <div class="slickList__filterBlock">
                <div class="slickList__filterBlock_body">
                    <div class="slickList__filterBlock_title">
                        <h4>Filter search</h4>
                    </div>

                    <div class="slickList__filterBlock_item">
                        <div class="slickList__filterBlock_header">Категория</div>
                        <ul class="slickList__filterBlock_ul">
                            <li v-for="category in categories" :key="'category-' + category.id" >
                                <input
                                    type="checkbox"
                                    :value="category.id"
                                    :id="'category-' + category.id"
                                    hidden
                                    v-model="filters.categories"
                                >
                                <label :for="'category-' + category.id">{{ category.name }}</label>
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
            categories: [],
            filters: {
                categories: []
            },
            searchString: ''
        }
    },
    components: {
        cardComponent
    },
    computed: {
        filteredSpecialists() {
            return this.doctors.filter(doctor => {
                let flag = true;

                //Фильтр по категориям
                if (this.filters.categories.length > 0) {
                    flag = this.filters.categories.some(el => el === doctor.category_id);
                }

                //Поиск
                if (this.searchString.length >=3 && flag){
                    const arrSearchWords = this.searchString.trim().split(' ');

                    for (let word of arrSearchWords) {
                        flag = flag &&
                            (doctor.user.name.toLowerCase().search(word.toLowerCase()) >= 0 ||
                            doctor.user.second_name.toLowerCase().search(word.toLowerCase()) >= 0 ||
                            doctor.user.surname.toLowerCase().search(word.toLowerCase()) >= 0 ||
                            doctor.category.name.toLowerCase().search(word.toLowerCase()) >= 0
                            )

                        ;
                    }
                }
                return flag;
            });
        }
    },
    mounted() {
        console.log(this.doctors)
        const categories = this.doctors.map(doctor => ({
            id: doctor.category.id,
            name: doctor.category.name
        }));

        categories.forEach(el => {
            if (!this.categories.some((category) => el.id === category.id))
                this.categories.push(el);
            }
        )
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
