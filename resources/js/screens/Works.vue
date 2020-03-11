<template>
    <section class="works">
        <div class="container">
            <div data-aos
                data-aos-id="works-filter"
                data-aos-top-offset="350"
                data-aos-bottom-offset="-200"
                class="works__filter">
                <a v-for="filter in filters" :key="filter.id" href="#"
                    @click.prevent="filterWorks(filter)">
                    <span>{{ filter.name }}</span>
                    <svg v-if="filter.active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 643.14 353.66">
                        <path class="works__filter_hover" d="M133.64,353.36c12.88-2.54,10.88-12.54,19.88-26.54,32.86-51.12,83.34-62.93,155.41-100.76,21.16-11.11,48.33-25.17,48.33-25.17,19.68-10.24,39.37-20.49,58.72-31.36A369.6,369.6,0,0,0,450.75,148c19.64-14.11,27.77-23.13,49.77-34.13,8-4,10.56-9.27,32-17,6.48-2.34,12.63-6.9,17.91-11.32s12.57-6,19-9c8.39-3.82,15.42-10,22.32-16.15l45.41-40.31c3-2.68,2.12-4.44,3.41-8.27s4-10,.15-11.3C552.4,22.57,467.34,55.64,382.56,88.62L288.78,125.1c-59.22,23-171.26,85.72-166.54,90.26,19.7.9,38.66-6.76,56.88-14.29,24.3-10,48.86-20.22,70-35.78s48.35-63.47,45.35-67.47c-5-4-37.71,6.76-55,13.89L40.86,193.62c-10.32,4.25-20.89,8.66-29,16.3S-1.64,229.24,1.33,240c13.53.61,27-1.82,40.31-4.23,33.78-6.13,67.66-12.28,100.43-22.51C214.38,190.7,279,149.11,342.64,108c6-3.85,12.59-11.62,7.79-16.85-2.95-3.21-8.11-2.43-12.35-1.39L237.39,114.48c-17.77,4.36-51.1,17-68.87,21.34-35.58,8.74-55.74,9.27-89.73,22.94C66.87,163.55,53,173.06,56,185.56c1.72,7.23,9.06,12,16.42,13s14.78-1,21.89-3.14a542.22,542.22,0,0,0,105.36-44.23c8.74-4.81,17.81-10.33,22.3-19.24s2-22-7.39-25.4c-5.23-1.89-10.8,1.11-16.36,1.14-22.49.11-39.66,3.43-56.66,9.1-13.3,4.43-7.84,6.7-13.78,8.19-3.22.81-5.22,4.81-5.22,9.81"/>
                    </svg>
                </a>
            </div>
            <div class="works__body"
                data-aos
                data-aos-id="works-body"
                data-aos-top-offset="300"
                data-aos-bottom-offset="-500">
                    <a v-for="image in images" :key="image.id"
                        href="#"
                        @click.prevent="$emit('open-modal', image.id)"
                        class="works__item"
                        :style="`background-image: url(${image.thumbUrl})`">
                    </a>
            </div>
        </div>


    </section>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                filters: [
                    {
                        id: 0,
                        name: 'all works',
                    },
                ],
                images: [],
                modalId: null,
            }
        },

        created() {
            this.getData();
            this.getFilters();
        },

        mounted() {
            document.addEventListener('aos:in:works-filter', () => {
                this.$anime({
                    targets: '.works__filter a',
                    opacity: [0, 1],
                    translateX: [0, -35],
                    duration: 200,
                    delay: this.$anime.stagger(150, { from: 'first' }),
                })
            })
            document.addEventListener('aos:out:works-filter', () => {
                this.$anime({
                    targets: '.works__filter a',
                    opacity: [1, 0],
                    translateX: [-35, 0],
                    duration: 200,
                    delay: this.$anime.stagger(75, { from: 'last' }),
                })
            })


            document.addEventListener('aos:in:works-body', () => {
                this.$anime({
                    targets: '.works__item',
                    opacity: [0, 1],
                    scale: [1.15, 1],
                    translateX: [() => this.$anime.random(-25, 25), 0],
                    translateY: [() => this.$anime.random(-25, 25), 0],
                    duration: 500,
                    easing: 'linear',
                    delay: this.$anime.stagger(400, { grid: [3, 5], from: 0 }),
                })
            })
            document.addEventListener('aos:out:works-body', () => {
                const targets = [...document.querySelectorAll('.works__item')]

                this.$anime({
                    targets: targets.splice(0, 4),
                    opacity: [1, 0],
                    scale: [1, 0.8],
                    duration: 200,
                    delay: this.$anime.stagger(150, { from: 'last' }),
                })
            })
        },

        methods: {
            getData(filterId) {
                axios.get('/api/v1/works', {
                    params: {
                        filter_id: filterId,
                    },
                }).then(({ data }) => {
                    this.images = data

                    if (filterId >= 0) {
                        this.$nextTick(() => {
                            this.$anime({
                                targets: '.works__item',
                                opacity: [0, 1],
                                scale: [1.15, 1],
                                translateX: [() => this.$anime.random(-25, 25), 0],
                                translateY: [() => this.$anime.random(-25, 25), 0],
                                duration: 300,
                                easing: 'linear',
                                delay: this.$anime.stagger(100, { grid: [3, 5], from: 0 }),
                            })
                        })
                    }
                })
            },
            getFilters() {
                axios.get('/api/v1/categories').then(({ data }) => {
                    this.filters = [
                        {
                            id: 0,
                            name: 'all works',
                        },
                        ...data,
                    ]
                })
            },
            filterWorks(selectedFilter) {
                this.getData(selectedFilter.id !== 0 ? selectedFilter.id : null)

                this.filters.forEach((filter) => {
                    this.$set(filter, 'active', filter.id === selectedFilter.id)
                })

                this.$nextTick(() => {
                    this.$anime({
                        targets: '.works__filter_hover',
                        strokeDashoffset: [this.$anime.setDashoffset, 0],
                        duration: 700,
                        easing: 'easeInOutSine',
                    })
                })
            },
        },
    }
</script>

<style lang="sass">
    .works
        padding-top: 240px
        background-color: $white
        .container
            max-width: 1550px
        &__filter
            +flex_sb_c
            max-width: 1140px
            margin-left: auto
            margin-right: auto
            margin-bottom: 70px
            &_hover
                fill: none
                stroke: #000
                stroke-width: 4
                stroke-miterlimit: 10
            a
                font-size: 1.5rem
                font-weight: 700
                line-height: 2
                letter-spacing: 0.3rem
                color: $black
                text-decoration: none
                position: relative
                transition: .3s
                opacity: 0
                &:hover
                    color: $red
                // +line_through_hover($red, $weight: 1px)
                svg
                    position: absolute
                    top: 5px
                    left: 50%
                    margin-left: -80px
                    width: 140px

        &__body
            +flex_sb_fs
            flex-wrap: wrap
            padding-bottom: 100px
            min-height: 700px

        &__item
            width: calc(33.3333% - 70px)
            padding-bottom: 35%
            background-repeat: no-repeat
            background-size: cover
            background-position: center
            display: block
            filter: grayscale(1)
            transition: 1s
            opacity: 0
            margin-bottom: 100px
            &:nth-of-type(2)
                margin-top: 185px
            &:nth-of-type(5)
                margin-top: 155px
            &:nth-of-type(2n - 1)
                margin-left: -25px
            &:nth-of-type(2n)
                margin-bottom: 55px
                margin-right: 25px
            &:nth-of-type(3n + 1)
                margin-top: 15px
                margin-right: -25px
            &:hover
                filter: none


</style>

