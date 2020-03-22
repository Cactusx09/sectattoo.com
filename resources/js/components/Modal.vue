<template>
    <div class="modal">
        <div class="container">
            <div class="body">
                <div class="image">
                    <div class="image__img" :style="`background-image: url(${image.thumbUrl})`"></div>
                    <div class="image__bg"></div>
                </div>
                <div class="info">
                    <h3>{{ image.name }}</h3>
                    <p>{{ image.notes }}</p>

                    <a href="#"
                        class="red justify"
                        v-html="wrapWords('for more detail contact me')"
                        @click.prevent="close({ moreDetails: true })">
                    </a>
                    <div class="info__bg"></div>
                </div>


                <div
                    class="close"
                    @click="close()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001">
                        <path d="M284.286 256.002L506.143 34.144c7.811-7.811 7.811-20.475 0-28.285-7.811-7.81-20.475-7.811-28.285 0L256 227.717 34.143 5.859c-7.811-7.811-20.475-7.811-28.285 0-7.81 7.811-7.811 20.475 0 28.285l221.857 221.857L5.858 477.859c-7.811 7.811-7.811 20.475 0 28.285a19.938 19.938 0 0014.143 5.857 19.94 19.94 0 0014.143-5.857L256 284.287l221.857 221.857c3.905 3.905 9.024 5.857 14.143 5.857s10.237-1.952 14.143-5.857c7.811-7.811 7.811-20.475 0-28.285L284.286 256.002z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props: {
            id: {
                type: Number,
                required: true,
            },
        },

        data() {
            return {
                image: {},
            }
        },

        created() {
            axios.get('/api/v1/works/modal', {
                    params: {
                        id: this.id,
                    },
                })
                .then(({ data }) => {
                    this.image = data
                })
        },

        mounted() {
            const viewPortHeight = document.documentElement.clientHeight;
            const viewPortWidth = document.documentElement.clientWidth;

            this.$anime.timeline()
                .add({
                    targets: '.modal',
                    scale: [1.05, 1],
                    opacity: [0, 1],
                })
                .add({
                    targets: '.image__bg',
                    translateX: [-viewPortWidth, 0],
                    easing: 'easeOutCubic',
                    duration: 1000,
                }, 200)
                .add({
                    targets: '.info__bg',
                    translateY: [-viewPortHeight - 200, 0],
                    easing: 'linear',
                    duration: 500,
                }, 800)
                .add({
                    targets: '.image__img',
                    scale: [0.97, 1],
                    opacity: [0, 1],
                    easing: 'spring(5, 50, 20, 7)',
                    duration: 500,
                }, 1300)
                .add({
                    targets: '.info h3, .info p, .info .red',
                    translateY: [-20, 0],
                    opacity: [0, 1],
                    delay: this.$anime.stagger(300, { from: 'first' }),
                    easing: 'spring(5, 50, 20, 7)',
                    duration: 500,
                }, 1400)
                .add({
                    targets: '.close',
                    scale: [0.85, 1],
                    opacity: [0, 1],
                    duration: 400,
                    easing: 'spring(10, 80, 30, 10)',
                }, 1600)
        },

        methods: {
            wrapWords(str, tmpl) {
                return str.replace(/[\w-',.!:]+/g, tmpl || '<span>$&</span>');
            },
            close({ moreDetails } = {}) {
                const viewPortHeight = document.documentElement.clientHeight;
                const viewPortWidth = document.documentElement.clientWidth;

                this.$anime.remove('.image__img, .info h3, .info p, .info .red, .close, .modal, .info__bg, .image__bg')

                this.$anime.timeline()
                    .add({
                        targets: '.close',
                        scale: [1, 0.85],
                        opacity: [1, 0],
                        duration: 600,
                        easing: 'spring(10, 80, 30, 10)',
                    }, 0)
                    .add({
                        targets: '.info h3, .info p, .info .red',
                        translateY: [0, 40],
                        opacity: 0,
                        easing: 'spring(5, 80, 30, 7)',
                        delay: this.$anime.stagger(200, { from: 'first' }),
                        duration: 700,
                    }, 100)
                    .add({
                        targets: '.image__img',
                        scale: [1, 0.85],
                        opacity: 0,
                        easing: 'spring(5, 50, 20, 7)',
                        duration: 700,
                    }, 500)
                    .add({
                        targets: '.info__bg',
                        translateY: [0, viewPortHeight + 200],
                        easing: 'spring(5, 50, 20, 7)',
                        duration: 600,
                    }, 1000)
                    .add({
                        targets: '.image__bg',
                        translateX: [0, -viewPortWidth],
                        duration: 1300,
                        easing: 'easeOutCubic',
                    }, 1500)
                    .add({
                        targets: '.modal',
                        scale: [1, 1.05],
                        opacity: 0,
                        duration: 450,
                        complete: () => this.$emit('close', moreDetails),
                    }, 1600)
            },
        },
    }
</script>

<style lang="sass" scoped>
.modal
    position: fixed
    left: 0
    top: 0
    width: 100%
    height: 100%
    z-index: 999
    // background: $black
    +flex_fs_s
    +mq($max: 1000px)
        overflow: auto

.container
    height: 100%
    +flex_fs_s
    +mq($max: 1000px)
        padding: 0
.body
    +flex_sb_s
    position: relative
    padding: 2rem
    width: 100%
    +mq($max: 1000px)
        padding: 4rem 1rem 1rem 1rem
        flex-wrap: wrap
        background: #212121
.image
    max-width: calc(100% - 375px)
    width: 100%
    position: relative
    +mq($max: 1000px)
        max-width: none
    &__img
        background-size: cover
        background-position: center
        background-repeat: no-repeat
        width: 100%
        position: absolute
        top: 0
        left: 0
        height: 100%
        z-index: 2
        +mq($max: 1000px)
            position: relative
            height: calc(100vh - 9rem)
    &__bg
        position: absolute
        width: 9999px
        height: calc(100% + 8rem)
        background: #161616
        right: -3rem
        top: -4rem
        z-index: -1
.info
    width: 300px
    padding-top: 4rem
    +flex_sb_s
    flex-direction: column
    position: relative
    +mq($max: 1000px)
        width: 100%
        padding-top: 1rem
    &__bg
        position: absolute
        width: 9999px
        height: calc(100% + 8rem)
        background: #212121
        left: -2.2rem
        top: -4rem
        z-index: -1

    h3
        color: #ffffff
        font-size: 1.5rem
        letter-spacing: .3rem
        font-weight: 400
        +mq($max: 1000px)
            margin-bottom: 0.5rem
    p
        color: rgba(#fff, 0.5)
        letter-spacing: .2rem
        line-height: 1.5
        margin-bottom: auto
    .red
        font-size: 1.125rem
        letter-spacing: .15rem
        font-weight: 700
        text-decoration: none
        margin-top: 1rem

.close
    position: absolute
    right: 0
    top: 2rem
    display: flex
    width: 2.1875rem
    cursor: pointer
    z-index: 9
    +mq($max: 1000px)
        top: 1rem
        right: 1rem
    &:hover
        svg path
            fill: $red
    svg
        width: 100%
        path
            fill: #fff
            transition: .5s

</style>
