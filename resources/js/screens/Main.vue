<template>
    <main class="main">
        <div class="main__bg">
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

    export default {
        mounted() {
            let mainLogoT = this.$anime.timeline({ autoplay: false, loop: true })
                .add({
                    targets: '.main__logo > img',
                    opacity: [1, .3, 1],
                    duration: this.$anime.random(50, 400),
                    delay: () => this.$anime.random(250, 3500),
                })

            const mainLogoBlackGlitch = () => {
                this.$anime({
                    targets: '.main__logo_black img',
                    opacity: [.6, .8, 0],
                    skew: [() => this.$anime.random(-5, 5), 0],
                    translateX: () => this.$anime.random(-10, 10),
                    translateY: () => this.$anime.random(-10, 10),
                    duration: () => this.$anime.random(20, 100),
                    delay: () => this.$anime.random(50, 2500),
                    complete: mainLogoBlackGlitch,
                })
            }

            const mainLogoWhiteGlitch = () => {
                this.$anime({
                    opacity: [.6, 1, 0],
                    targets: '.main__logo_white',
                    skew: [() => this.$anime.random(-5, 5), 0],
                    translateX: () => this.$anime.random(-10, 10),
                    translateY: () => this.$anime.random(-10, 10),
                    duration: () => this.$anime.random(20, 100),
                    delay: () => this.$anime.random(50, 2500),
                    complete: mainLogoWhiteGlitch,
                })
            }


            this.$inView('.main__logo')
                .on('enter', () => {
                    mainLogoT.restart()
                    mainLogoBlackGlitch()
                    mainLogoWhiteGlitch()
                })
                .on('exit', () => {
                    mainLogoT.pause()
                    this.$anime.remove('.main__logo_black')
                    this.$anime.remove('.main__logo_white')
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
                opacity: 0.5
                position: absolute
                left: 0
                top: 0
                width: 100%
                height: 100%

</style>

