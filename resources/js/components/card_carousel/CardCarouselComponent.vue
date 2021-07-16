<template>
    <div class="slickList overflow">

        <div class="slickTrack">
            <div class="slickTrack__visible">
                <cardComponent
                    v-for="(item, i) in specialists" :key="i"
                    :item="item"
                    :routedoctor="routedoctor"
                    :routeshedule="routeshedule"
                />
            </div>
        </div>

        <div class="slickNavigation">
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
import cardComponent from '../doctor/cardComponent.vue'

export default {
    name: 'CardCarouselComponent',
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
        }
    },
    components: {
        cardComponent
    },
    methods: {
        initSlider() {
            this.sliderWidth = this.specialists.length * this.widthItem;
            this.currentOffsetBlock = document.querySelector('.slickList').offsetWidth;

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
            let rightEl = Math.floor(slickList.offsetWidth / (this.specialists.length * this.widthItem) * 10);
            let slickNavigation__left = document.querySelector('.slickNavigation__left');
            let slickNavigation__right = document.querySelector('.slickNavigation__right');

            slickNavigation__left.classList.remove('slickNavigation__hide');

            if ( (this.currentItem + rightEl - 2) > (this.specialists.length)) {
                return null;
            }

            this.currentItem++;

            if ( (this.currentItem + rightEl - 2) === (this.specialists.length)) {
                slickNavigation__right.classList.add('slickNavigation__hide');
                this.offset = slickList.offsetWidth - this.sliderWidth - (this.marginBlock * this.specialists.length);
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
        this.initSlider();
    }
}
</script>
<style>
    .slickList {
        position: relative;
        padding: 10px;
    }

    .overflow {
        overflow: hidden;
    }

    .slickList__body {
        display: flex;
        justify-content: space-between;
    }

    .slickTrack__visible {
        display: flex;
        flex-wrap: nowrap;
    }

    .slickTrack__visibleList {
        display: flex;
        flex-wrap: wrap;
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

    .active_star {
        color: #f4c150;
    }

    .noActive_star {
        color: #dedfe0;
    }

</style>
