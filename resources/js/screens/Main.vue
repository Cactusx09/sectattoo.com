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
            <div class="main__logo_glitch">
                <img class="main__logo_bold" src="@images/letters/s.png">
                <img class="main__logo_bold" src="@images/letters/e.png">
                <img class="main__logo_bold" src="@images/letters/c.png">
                <img class="main__logo_bold" src="@images/letters/t.png">
                <img class="main__logo_tat" src="@images/letters/tat.png">
                <img src="@images/letters/t2.png">
                <img src="@images/letters/o.png">
                <img src="@images/letters/o.png">
            </div>
        </div>
    </main>
</template>

<script>

    export default {
        mounted() {
            let mainLogoT = this.$anime.timeline({ autoplay: false, loop: true })
                .add({
                    targets: '.main__logo img',
                    opacity: [1, .3, 1],
                    duration: this.$anime.random(50, 400),
                    delay: () => this.$anime.random(250, 3500),
                })

            const mainLogoGlitchFunction = () => {
                this.$anime({
                    targets: '.main__logo_glitch',
                    opacity: [.6, .4, 0],
                    skew: [() => this.$anime.random(-5, 5), 0],
                    translateX: () => this.$anime.random(-10, 10),
                    translateY: () => this.$anime.random(-10, 10),
                    duration: () => this.$anime.random(20, 100),
                    delay: () => this.$anime.random(50, 2500),
                    complete: mainLogoGlitchFunction,
                })
            }


            this.$inView('.main__logo')
                .on('enter', () => {
                    mainLogoT.restart()
                    mainLogoGlitchFunction()
                })
                .on('exit', () => {
                    mainLogoT.pause()
                    this.$anime.remove('.main__logo_glitch')
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
            z-index: -1
            video
                position: absolute
                height: 100%
                left: 50%
                top: 50%
                transform: translateX(-50%) translateY(-50%) translateZ(0)
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
                opacity: 0.5

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

            &_glitch
                +flex_c_c
                opacity: 0.2
                position: absolute
                left: 0
                top: 0
                width: 100%
                height: 100%

</style>

