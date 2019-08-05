<template>
    <section class="works">
        <div class="container">
            <div class="works__filter">
                <a v-for="filter in filters" :key="filter.id" href="#"
                    @click.prevent="filterWorks(filter)">
                    <span>{{ filter.name }}</span>
                    <svg v-if="filter.active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 643.14 353.66">
                        <path class="works__filter_hover" d="M133.64,353.36c12.88-2.54,10.88-12.54,19.88-26.54,32.86-51.12,83.34-62.93,155.41-100.76,21.16-11.11,48.33-25.17,48.33-25.17,19.68-10.24,39.37-20.49,58.72-31.36A369.6,369.6,0,0,0,450.75,148c19.64-14.11,27.77-23.13,49.77-34.13,8-4,10.56-9.27,32-17,6.48-2.34,12.63-6.9,17.91-11.32s12.57-6,19-9c8.39-3.82,15.42-10,22.32-16.15l45.41-40.31c3-2.68,2.12-4.44,3.41-8.27s4-10,.15-11.3C552.4,22.57,467.34,55.64,382.56,88.62L288.78,125.1c-59.22,23-171.26,85.72-166.54,90.26,19.7.9,38.66-6.76,56.88-14.29,24.3-10,48.86-20.22,70-35.78s48.35-63.47,45.35-67.47c-5-4-37.71,6.76-55,13.89L40.86,193.62c-10.32,4.25-20.89,8.66-29,16.3S-1.64,229.24,1.33,240c13.53.61,27-1.82,40.31-4.23,33.78-6.13,67.66-12.28,100.43-22.51C214.38,190.7,279,149.11,342.64,108c6-3.85,12.59-11.62,7.79-16.85-2.95-3.21-8.11-2.43-12.35-1.39L237.39,114.48c-17.77,4.36-51.1,17-68.87,21.34-35.58,8.74-55.74,9.27-89.73,22.94C66.87,163.55,53,173.06,56,185.56c1.72,7.23,9.06,12,16.42,13s14.78-1,21.89-3.14a542.22,542.22,0,0,0,105.36-44.23c8.74-4.81,17.81-10.33,22.3-19.24s2-22-7.39-25.4c-5.23-1.89-10.8,1.11-16.36,1.14-22.49.11-39.66,3.43-56.66,9.1-13.3,4.43-7.84,6.7-13.78,8.19-3.22.81-5.22,4.81-5.22,9.81"/>
                    </svg>
                </a>
            </div>
            <div class="works__body">
                <div class="works__col">
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/405/469')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/415/469')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/405/479')"></a>
                </div>
                <div class="works__col">
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/408/499')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/425/489')"></a>
                </div>
                <div class="works__col">
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/444/449')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/433/465')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/422/479')"></a>
                </div>
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
                        id: 1,
                        name: 'all works',
                    },
                    {
                        id: 2,
                        name: 'sketch',
                    },
                    {
                        id: 3,
                        name: 'tattoo',
                    },
                    {
                        id: 4,
                        name: 'art',
                    },
                    {
                        id: 5,
                        name: 'text me',
                    },
                ],
            }
        },

        mounted() {
            axios.get('/api/v1/works').then((data) => {
                console.log(data)
            });
        },

        methods: {
            filterWorks(selectedFilter) {
                this.filters.forEach(filter => {
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
                transition: .5s
                &:hover
                    color: $red
                svg
                    position: absolute
                    top: 5px
                    left: 50%
                    margin-left: -80px
                    width: 140px

        &__body
            +flex_sb_fs
        &__col
            width: calc(33.3333% - 25px)
            +flex_sb_c
            flex-direction: column

            &:nth-of-type(1)
                .works__item
                    margin-bottom: 120px
                    &:nth-of-type(2n - 1)
                        margin-left: 35px
                    &:nth-of-type(2n)
                        margin-left: auto
                    &:nth-of-type(3n)
                        margin-right: auto
                        margin-left: -15px

            &:nth-of-type(2)
                .works__item
                    margin-bottom: 290px
                    &:nth-of-type(2n - 1)
                        margin-top: 135px
                    &:nth-of-type(2n)
                        margin-left: 7px
                    &:nth-of-type(3n)
                        margin-right: 7px

            &:nth-of-type(3)
                .works__item
                    margin-bottom: 65px
                    &:nth-of-type(2n - 1)
                        margin-left: 60px
                    &:nth-of-type(2n)
                        margin-right: auto
                    &:nth-of-type(3n)
                        margin-left: auto
                        margin-right: -15px


        &__item
            width: 82%
            height: 469px
            background-repeat: no-repeat
            background-size: cover
            background-position: center
            display: block
            filter: grayscale(1)
            transition: 1s
            &:hover
                filter: none


</style>

