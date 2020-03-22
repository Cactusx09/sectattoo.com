<template>
    <section class="bio">
        <div class="container">
            <div class="bio__body">

                <div data-aos
                    data-aos-id="bio-text"
                    data-aos-top-offset="500"
                    data-aos-bottom-offset="200"
                    class="bio__text">
                    <p class="red justify" v-html="wrapWords(text.top)"></p>

                    <p v-for="(paragraph, index) in text.paragraphs" :key="index"
                        v-html="wrapWords(paragraph)">
                    </p>

                    <p class="red justify" v-html="wrapWords(text.bottom)"></p>
                </div>


                <div data-aos="fade-up-left"
                    class="bio__video">
                    <video autoplay muted loop playsinline>
                        <source src="@images/anisa.webm" type="video/webm">
                        <source src="@images/anisa.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            bio: {
                type: String,
            },
        },

        data() {
            return {
                text: {
                    top: 'H e l l o !',
                    paragraphs: this.bio.split('\n'),
                    bottom: 's t y l e .',
                },
            }
        },

        mounted() {
            document.addEventListener('aos:in:bio-text', () => {
                this.$anime.remove('.bio__text p')

                this.$anime({
                    targets: '.bio__text p',
                    translateY: [-50, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: 'spring(10, 80, 30, 10)',
                    delay: this.$anime.stagger(250, { from: 'first' }),
                })

                this.$anime({
                    targets: '.bio__text p',
                    textShadow: [
                        '0px 0px 0px rgba(36.5%, 91%, 89.8%, 0), 0px 0px 0px rgba(95.7%, 30.2%, 60.8%, 0)',
                        '0px 20px 2px rgba(36.5%, 91%, 89.8%, 1), 0px 10px 2px rgba(95.7%, 30.2%, 60.8%, 1)',
                        '0px -10px 2px rgba(36.5%, 91%, 89.8%, 1), 0px -20px 2px rgba(95.7%, 30.2%, 60.8%, 1)',
                        '0px 0px 0px rgba(36.5%, 91%, 89.8%, 0), 0px 0px 0px rgba(95.7%, 30.2%, 60.8%, 0)',
                    ],
                    easing: 'linear',
                    duration: 2000,
                    delay: this.$anime.stagger(150, { from: 'first' }),
                })
            })

            document.addEventListener('aos:out:bio-text', () => {
                this.$anime.remove('.bio__text p')

                this.$anime({
                    targets: '.bio__text p',
                    translateY: 0,
                    translateZ: 0,
                    opacity: 0,
                    duration: 1500,
                    delay: this.$anime.stagger(200, { from: 'last' }),
                })
            })
        },

        methods: {
            wrapWords(str, tmpl) {
                return str.replace(/[\w-',.!:]+/g, tmpl || '<span>$&</span>');
            },
        },
    }
</script>

<style lang="sass">
    .bio
        position: relative
        z-index: 2
        &:before
            content: ''
            position: absolute
            top: 0
            left: 0
            width: 100%
            height: 1000px
            z-index: 2
            background: $black
        &__body
            +flex_sb_s
            +mq($max: 900px)
                flex-wrap: wrap
        &__text
            width: calc(60% - 70px)
            max-width: 520px
            color: white
            text-align: justify
            padding-top: 50px
            position: relative
            z-index: 2
            +mq(1000px, 1200px)
                width: calc(60% - 25px)
                max-width: 500px
            +mq($max: 900px)
                width: calc(100% + 10px)
                max-width: calc(100% + 10px)
                margin-right: -10px
            +mq($max: 600px)
                padding-top: 2rem
            p
                font-size: 1.125rem
                font-weight: 700
                line-height: 2.6
                +flex_sb_fe
                letter-spacing: 0.028rem
                flex-wrap: wrap
                margin-bottom: 2rem
                opacity: 0
                +mq($max: 720px)
                    opacity: 1
                +mq($max: 600px)
                    margin-bottom: 1rem
                    line-height: 2.2
                +mq($max: 420px)
                    font-size: 1rem
                span
                    margin-right: 10px
                    // opacity: 0

        &__video
            background: url('~images/anisa.jpg') no-repeat center
            position: absolute
            // left: calc(53% + 70px)
            right: 0
            top: 0
            height: 1071px
            width: calc(47% - 70px)
            background-size: cover
            overflow: hidden
            z-index: 5
            +mq(1000px, 1200px)
                width: calc(50% - 55px)
            +mq(900px, 1000px)
                width: calc(50% - 45px)
            +mq($max: 900px)
                margin-top: 50px
                position: relative
                width: calc(100% + 50px)
                margin-left: -25px
                margin-right: -25px
            +mq($max: 600px)
                margin-top: 2rem
                height: 700px

            video
                position: absolute
                left: 0
                top: 0
                height: 100%
                +mq(900px, 1000px)
                    left: -240px
                +mq(720px, 900px)
                    left: -90px
                +mq(600px, 720px)
                    left: -180px
                +mq($max: 600px)
                    left: -50px

</style>

