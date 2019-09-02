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
                    <video autoplay muted loop>
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
        data() {
            return {
                text: {
                    top: 'H e l l o !',
                    paragraphs: [
                        'I\'m a self-taught artist based in Toronto, Canada. Whatever I\'m ready to share with  you, i will upload here, on this website.',
                        'I constantly watch and take in the nature around us, that\'s why I believe the most beautiful has already been created by nature. I only depict what comes to my consciousness and, as if through the prism of my perception and individual experience, pour out onto the canvas.',
                        '3 years ago I started transforming human skin in to ark. I see tattoos as a language that we use to say something in our own personal way. Doing tattoos, my goal is to help people express themselves and create their own',
                    ],
                    bottom: 's t y l e .',
                }
            }
        },

        mounted() {
            document.addEventListener('aos:in:bio-text', ({detail}) => {
                this.$anime.remove('.bio__text p')

                this.$anime({
                    targets: '.bio__text p',
                    translateY: [-50, 0],
                    translateZ: 0,
                    opacity: [0, 1],
                    easing: 'spring(10, 80, 30, 10)',
                    delay: this.$anime.stagger(250, {from: 'first'}),
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
                    delay: this.$anime.stagger(150, {from: 'first'}),
                })
            })

            document.addEventListener('aos:out:bio-text', ({detail}) => {
                this.$anime.remove('.bio__text p')

                this.$anime({
                    targets: '.bio__text p',
                    translateY: 0,
                    translateZ: 0,
                    opacity: 0,
                    duration: 1500,
                    delay: this.$anime.stagger(200, {from: 'last'}),
                })
            })
        },

        methods: {
            wrapWords(str, tmpl) {
                return str.replace(/[\w-',.!:]+/g, tmpl || '<span>$&</span>');
            }
        }
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

        &__text
            width: calc(60% - 70px)
            max-width: 520px
            color: white
            text-align: justify
            padding-top: 50px
            position: relative
            z-index: 2

            p
                font-size: 1.125rem
                font-weight: 700
                line-height: 2.6
                +flex_sb_fe
                letter-spacing: 0.028rem
                flex-wrap: wrap
                margin-bottom: 2rem
                opacity: 0
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
            video
                position: absolute
                left: 0
                top: 0
                height: 100%

</style>

