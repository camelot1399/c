<template>
    <div class="slickList">
        <div class="slickTrack">
            <div class="slickTrack__visible">
                <div class="slickSlide" v-for="(item, i) in slides" :key="i">
                    <div class="slickSlide__img">
                        <img :src="item.img" :alt="item.name">
                    </div>
                    <div class="slickSlide__content">
                        <h3 class="slickSlide__h3">{{item.name}}</h3>

                        <div class="slickSlide__buttons">
                            <a href="#" class="slickSlide__btn btn">View Profile</a>
                            <a href="#" class="slickSlide__btn btn">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="slickNavigation">
            <button class="slickNavigation__left" data-control="left"><</button>
            <button class="slickNavigation__right" data-control="right">></button>
        </div>
    </div>
</template>
<script>
export default {
    name: 'CardCarouselComponent',
    data() {
        return {
            slides: [
                {
                    name: 'Анастасия',
                    img: 'https://dreamstechnologies.co.in/docucare/assets/img/doctors/doctor-03.jpg',

                },
                {
                    name: 'Анастасия',
                    img: 'https://dreamstechnologies.co.in/docucare/assets/img/doctors/doctor-03.jpg',

                },
                {
                    name: 'Анастасия',
                    img: 'https://dreamstechnologies.co.in/docucare/assets/img/doctors/doctor-03.jpg',

                },
                {
                    name: 'Анастасия',
                    img: 'https://dreamstechnologies.co.in/docucare/assets/img/doctors/doctor-03.jpg',

                },
                {
                    name: 'Анастасия',
                    img: 'https://dreamstechnologies.co.in/docucare/assets/img/doctors/doctor-03.jpg',

                },
                {
                    name: 'Анастасия',
                    img: 'https://dreamstechnologies.co.in/docucare/assets/img/doctors/doctor-03.jpg',

                },
                {
                    name: 'Анастасия',
                    img: 'https://dreamstechnologies.co.in/docucare/assets/img/doctors/doctor-03.jpg',

                }
            ],
            offset: 0,
            currentItem: 1,
            widthItem: 0,
            sliderWidth: 0,
            currentOffsetBlock: 0,
        }
    },
    methods: {
        init() {
            this.widthItem = document.querySelector('.slickSlide').offsetWidth;
            this.sliderWidth = this.slides.length * this.widthItem;
            this.currentOffsetBlock = document.querySelector('.slickList').offsetWidth;
            console.log(this.currentOffsetBlock);

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
            console.log(`currentItem: ${this.currentItem}`);
            console.log(`this.sliderWidth: ${this.sliderWidth}`);
            console.log(`this.offset: ${this.offset}`);
            if (this.currentItem === 1) {
                return null;
            }

            if (this.currentItem === 2) {
                this.offset = (this.widthItem + this.offset) + this.offset;
            } else {
                this.offset = this.offset + this.widthItem;
            }


            if ((this.widthItem + this.offset) < -this.widthItem) {
                console.log(`осталось: ${this.widthItem + this.offset}`);
            }

            this.currentItem--;
            console.log(`currentItem: ${this.currentItem}`);
            if (this.offset === 0) {
                return null;
            }

            let slickList = document.querySelector('.slickList');
            let slickTrack = document.querySelector('.slickTrack');
            let widthViewBox = slickList.offsetWidth;


            this.currentOffsetBlock = this.currentOffsetBlock - this.widthItem;
            slickTrack.style.transform = `translateX(${this.offset}px)`;

        },
        slideToRight() {
            let slickList = document.querySelector('.slickList');
            let rightEl = Math.floor(slickList.offsetWidth / (this.slides.length * this.widthItem) * 10);

            console.log(this.currentItem + Math.ceil(slickList.offsetWidth / (this.slides.length * this.widthItem) * 10));


            if ( (this.currentItem + rightEl - 1) > (this.slides.length)) {
                return null;
            }

            this.currentItem++;
            console.log(`currentItem: ${this.currentItem}`);

            if ( (this.sliderWidth - this.currentOffsetBlock) < this.widthItem ) {
                this.offset = this.offset - (this.sliderWidth - this.currentOffsetBlock);
            } else {
                this.offset = this.offset - this.widthItem;
            }

            let slickTrack = document.querySelector('.slickTrack');
            let widthViewBox = slickList.offsetWidth;
            this.currentOffsetBlock = this.currentOffsetBlock + this.widthItem;
            slickTrack.style.transform = `translateX(${this.offset}px)`;


        },
        calculateOffset() {

        }
    },
    mounted() {
        this.init();
    }

}
</script>
<style>
    .slickSlide {
        display: block;
        margin-left: 0;
        padding: 10px;
        min-width: 280px;
        /* box-sizing: border-box; */
    }

    .slickList {
        position: relative;
        overflow: hidden;
    }

    .slickTrack__visible {
        display: flex;
        flex-wrap: nowrap;
    }

    .btn {
        color: #4890cb;
        font-size: 13px;
        border: 2px solid #4890cb;
        text-align: center;
        display: block;
        font-weight: 500;
        padding: 6px;
    }

    .slickSlide__buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
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



</style>
