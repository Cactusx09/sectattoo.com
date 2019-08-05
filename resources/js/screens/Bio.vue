<template>
    <section class="bio">
        <div class="container">
            <div class="bio__body">

                <div class="bio__text">
                    <p class="red justify" v-html="wrapWords(text.top)"></p>

                    <p v-for="(paragraph, index) in text.paragraphs" :key="index"
                        v-html="wrapWords(paragraph)">
                    </p>

                    <p class="red justify" v-html="wrapWords(text.bottom)"></p>
                </div>


                <div class="bio__video">
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
    import waypoints from 'waypoints/lib/noframework.waypoints.js'

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
            new Waypoint({
                element: document.querySelector('.bio__text'),
                handler: (direction) => {
                    if(direction === 'up') {
                        let filteredTargets = [];
                        for (var el of document.querySelectorAll('.bio__text span')) {
                            if(el.style.opacity == 1) filteredTargets.push(el)
                        }
                        this.$anime.remove('.bio__text span');


                        this.$anime({
                            targets: '.bio__text span',
                            opacity: 0,
                            translateX: [0, -15],
                            duration: 700,
                            delay: this.$anime.stagger(50, {from: 'last'}),
                        })
                    } else {
                        let filteredTargets = [];
                        for (var el of document.querySelectorAll('.bio__text span')) {
                            if(el.style.opacity != 1) filteredTargets.push(el)
                        }
                        this.$anime.remove('.bio__text span');

                        this.$anime({
                            targets: filteredTargets,
                            translateX: [-15, 0],
                            translateZ: 0,
                            opacity: 1,
                            delay: this.$anime.stagger(50, {from: 'first'}),
                            duration: 700,
                        })
                    }
                },
                offset: '50%',
            })


            new Waypoint({
                element: document.querySelector('.bio'),
                handler: (direction) => {
                    if(direction === 'up') {
                        this.$anime({
                            targets: '.bio__video',
                            scale: 1.1,
                            opacity: 0,
                            duration: 500,
                            easing: 'linear',
                        })




                    } else {
                        this.$anime({
                            targets: '.bio__video',
                            scale: 1,
                            opacity: 1,
                            duration: 500,
                            easing: 'linear',
                        })
                    }
                },
                offset: '80%',
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
            span
                opacity: 0

            p
                font-size: 1.125rem
                font-weight: 700
                line-height: 2.6
                +flex_sb_fe
                letter-spacing: 0.028rem
                flex-wrap: wrap
                margin-bottom: 2rem
                span
                    margin-right: 10px

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
            opacity: 0
            video
                position: absolute
                left: 0
                top: 0
                height: 100%

</style>

