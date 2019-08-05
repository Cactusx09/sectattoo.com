<template>
    <main class="main">
        <div class="main__bg" v-parallax=".5">
            <video autoplay muted loop>
                <source src="@images/main.webm" type="video/webm">
                <source src="@images/main.mp4" type="video/mp4">
            </video>
        </div>
        <div class="main__logo">
            <img class="main__logo_bold" src="@images/letters/s.png">
            <img class="main__logo_bold" src="@images/letters/e.png">
            <img class="main__logo_bold" src="@images/letters/c.png">
            <img class="main__logo_bold" src="@images/letters/t.png">
            <img class="main__logo_tat" src="@images/letters/tat.png">
            <img src="@images/letters/t2.png">
            <img src="@images/letters/o.png">
            <img src="@images/letters/o.png">
            <div class="main__logo_black">
                <img class="main__logo_bold" src="@images/letters/black/s-black.png">
                <img class="main__logo_bold" src="@images/letters/black/e-black.png">
                <img class="main__logo_bold" src="@images/letters/black/c-black.png">
                <img class="main__logo_bold" src="@images/letters/black/t-black.png">
                <img class="main__logo_tat" src="@images/letters/black/tat-black.png">
                <img src="@images/letters/black/t2-black.png">
                <img src="@images/letters/black/o-black.png">
                <img src="@images/letters/black/o-black.png">
            </div>
            <div class="main__logo_white">
                <img class="main__logo_bold" src="@images/letters/white/s-white.png">
                <img class="main__logo_bold" src="@images/letters/white/e-white.png">
                <img class="main__logo_bold" src="@images/letters/white/c-white.png">
                <img class="main__logo_bold" src="@images/letters/white/t-white.png">
                <img class="main__logo_tat" src="@images/letters/white/tat-white.png">
                <img src="@images/letters/white/t2-white.png">
                <img src="@images/letters/white/o-white.png">
                <img src="@images/letters/white/o-white.png">
            </div>
        </div>
    </main>
</template>

<script>

    import waypoints from 'waypoints/lib/noframework.waypoints.js'

    export default {
        mounted() {
            const start = this.$anime.timeline()
                .add({
                    targets: '.main',
                    opacity: [0, 1],
                    duration: 7000,
                })
                .add({
                    targets: '.main__logo',
                    duration: 10000,
                    opacity: [0, 1],
                }, 2000)
                .add({
                    targets: '.header__nav a',
                    duration: 2000,
                    translateX: [-200, 0],
                    opacity: [0, 1],
                    delay: this.$anime.stagger(100),
                }, 3000)


            const mainLogoImages = () => {
                this.$anime({
                    targets: '.main__logo > img, .main__logo_white img',
                    opacity: [0, () => this.$anime.random(0, 1), () => this.$anime.random(0, 1)],
                    duration: () => this.$anime.random(50, 100),
                    delay: () => this.$anime.random(250, 1500),
                    complete: mainLogoImages,
                })
            }

            const mainLogoGlitch = () => {
                this.$anime({
                    targets: '.main__logo_black, .main__logo_white',
                    skew: [() => this.$anime.random(-5, 5), 0],
                    translateX: [() => this.$anime.random(-5, 10), 0],
                    translateY: [() => this.$anime.random(-10, 5), 0],
                    duration: () => this.$anime.random(50, 200),
                    delay: () => this.$anime.random(150, 6500),
                    complete: mainLogoGlitch,
                })

                this.$anime({
                    targets: '.main__logo_black, .main__logo_white',
                    opacity: [1, .8, .3, .9],
                    zIndex: () => this.$anime.random(-4, 1),
                    duration: () => this.$anime.random(50, 300),
                })
            }

            mainLogoImages()
            mainLogoGlitch()
            const logoEl = document.querySelector('.main__logo')
            new Waypoint({
                element: logoEl,
                handler: (direction) => {
                    if(direction === 'up') {
                        this.$anime({
                            targets: logoEl,
                            translateY: 0,
                            scale: 1,
                            opacity: 1,
                            duration: 2000,
                        })
                        mainLogoImages()
                        mainLogoGlitch()
                    } else {
                        this.$anime({
                            targets: logoEl,
                            translateY: -100,
                            scale: .98,
                            opacity: 0,
                            duration: 2000,
                        })

                        this.$anime.remove('.main__logo img')
                        this.$anime.remove('.main__logo_black')
                        this.$anime.remove('.main__logo_white')
                    }
                },
            })
        },
    }
</script>

<style lang="sass">
    .main
        background: url('~images/bg/main.jpg') no-repeat center
        background-size: cover
        min-height: 100vh
        padding: 1rem 1rem 2rem
        +flex_c_c
        position: relative
        z-index: 0
        overflow: hidden

        &__bg
            position: absolute
            left: 0
            top: 0
            width: 100%
            height: 100%
            video
                position: absolute
                height: 100%
                left: 50%
                top: 50%
                transform: translateX(-50%) translateY(-50%) translateZ(0)
                z-index: -2
                @media (min-aspect-ratio: 16/9)
                    width: 100%
                    height: auto

            &:before
                content: ''
                left: -1px
                top: -1px
                width: 100%
                height: 100%
                background-color: $black
                position: absolute
                opacity: .3
                z-index: -1

        &__logo
            position: relative
            z-index: 0
            +flex_c_c
            img
                &:not(:last-of-type)
                    margin-right: 3.9rem
            &_tat
                margin-top: 2.4rem
            &_bold
                margin-bottom: 0.5rem

            &_black,
            &_white
                +flex_c_c
                opacity: 1
                position: absolute
                left: 0
                top: 0
                width: 100%
                height: 100%
                z-index: -1

</style>

