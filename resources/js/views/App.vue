<template>
    <div class="wraper">
        <div class="app" id="app">
            <header class="header">
                <div class="container">
                    <nav class="header__nav">
                        <a href="#"
                            @click="scrollBar.scrollIntoView('.bio')">
                            <span>about me</span>
                        </a>
                        <a href="#"
                            @click="scrollBar.scrollIntoView('.works')">
                            <span>my works</span>
                        </a>
                        <a href="#"
                            @click="scrollBar.scrollIntoView('.questions')">
                            <span>FAQ</span>
                        </a>
                    </nav>
                </div>
            </header>
            <router-view
                @open-modal="modalId = $event"
                @set-questions="updateScroll()">
            </router-view>
        </div>

        <modal
            v-if="modalId"
            :id="modalId"
            @more-details="moreDetails()"
            @close="closeModal({ moreDetails: $event})"/>
    </div>
</template>

<script>
    import Modal from '@components/Modal'

    import ScrollAnimations from '../Scrollbar'

    export default {
        components: {
            Modal,
        },

        data() {
            return {
                scrollBar: null,
                modalId: null,
            }
        },
        mounted() {
            // Scrollbar.use(OverscrollPlugin);
            // Scrollbar.init(document.querySelector('#app'), {
            //     plugins: {
            //         overscroll: true,
            //         maxOverscroll: 150,
            //         damping: .2,
            //     },
            // })

            this.scrollBar = new ScrollAnimations({
                element: '#app',
                scrollBarOptions: {
                    plugins: {
                        overscroll: true,
                        maxOverscroll: 150,
                        damping: 0.2,
                    },
                },
            })

        },

        methods: {
            updateScroll() {
                console.log('update scroll')
            },
            closeModal({ moreDetails } = {}) {
                this.modalId = null

                if (moreDetails) this.scrollBar.scrollIntoView('.contacts')
            },
        },
    }
</script>

<style lang="sass">
    @import '/fonts/fonts.css'
    @import 'resources/sass/web/reset.sass'

    body,.wraper
        position: fixed
        left: 0
        top: 0
        bottom: 0
        right: 0
        z-index: 3
        background-color: $black
        user-select: none

    .app
        font: 16px 'Century Gothic', Helvetica, Helvetica Neue, Arial
        cursor: default
        position: relative
        color: $black
        user-select: none
        overflow-x: hidden
        width: 100%
        height: 100%
        // position: fixed
        // left: 0
        // top: 0
        // bottom: 0
        // right: 0
        // z-index: 3

    .container
        max-width: 1100px
        width: 100%
        padding-left: 15px
        padding-right: 15px
        margin-left: auto
        margin-right: auto
        box-sizing: border-box

    .red
        color: $red
    .justify
        +flex_sb_fe

    .field
        position: relative
        font-size: 1.125rem
        font-weight: 700
        line-height: 2.67
        letter-spacing: .7rem
        .label
            color: $gray
            position: absolute
            left: 0
            bottom: 30px
            line-height: 1
            pointer-events: none
            span
                display: inline-block
                position: relative
                z-index: 0
                &:before
                    content: ''
                    position: absolute
                    left: 0
                    bottom: -8px
                    width: 1000px
                    height: 40px
                    background: linear-gradient(to top, $black 80%, rgba($black, .1) 90%, rgba($black, 0) 100%)
                    z-index: -1
        .input,
        .textarea
            display: block
            width: 100%
            background: none
            border: none
            outline: none
            line-height: 1.3
            letter-spacing: .3rem
            color: $white
            min-height: 80px
            font-wight: 400
        .textarea
            min-height: 150px
        &:before
            content: ''
            position: absolute
            left: 0
            bottom: 0
            height: 2px
            width: 100%
            background: #e6e6e6
            z-index: 5

    .button
        background: none
        border: none
        outline: none
        width: 100%
        padding: 0
        cursor: pointer
        >span
            +flex_fs_c
            border-bottom: 2px solid $red
            font-size: 1.5rem
            font-weight: 700
            line-height: 2
            letter-spacing: 3.7rem
            color: $red
            padding-bottom: 20px



    .header
        position: absolute
        left: 0
        top: 0
        width: 100%
        padding-top: 5vh
        z-index: 5
        &__nav
            +flex_fs_c
            a
                font-size: 1.125rem
                color: $white
                text-decoration: none
                letter-spacing: 0.028rem
                font-weight: 700
                line-height: 2.67
                transition: .3s
                &:hover
                    color: $red
                &:not(:last-of-type)
                    margin-right: 6rem
</style>

