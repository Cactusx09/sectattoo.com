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


                <div class="bio__video"></div>
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
            z-index: -1
            background: $black
        &__body
            +flex_sb_s

        &__text
            width: calc(50% - 70px)
            max-width: 600px
            color: white
            text-align: justify
            padding-top: 50px

            p
                font-size: 1.125rem
                font-weight: 700
                line-height: 2.67
                +flex_sb_fe
                flex-wrap: wrap
                span
                    margin-right: 10px
                &.red
                    color: $red

            .justify
                +flex_sb_fe
            // +flex_c_fs
            // flex-direction: column
        &__video
            background: url('~images/anisa.jpg') no-repeat center
            position: absolute
            left: calc(50% + 70px)
            top: 0
            height: 1071px
            width: calc(50% - 70px)
            background-size: cover




</style>

