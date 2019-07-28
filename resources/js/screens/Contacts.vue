<template>
    <section class="contacts">
        <div class="container">
            <div class="contacts__body">
                <div class="contacts__left">
                <form class="contacts__form">
                    <p class="red justify title" v-html="wrapWords(text.top)"></p>
                    <div class="field">
                        <label class="label">name</label>
                        <input class="input" type="text" name="name">
                    </div>
                    <div class="field">
                        <label class="label">e-mail</label>
                        <input class="input" type="text" name="mail">
                    </div>
                    <div class="field">
                        <label class="label">text</label>
                        <textarea class="textarea" name="message"></textarea>
                    </div>

                    <button class="button"><span><span>send</span></span></button>
                </form>

                <div class="contacts__info">
                    <div class="contacts__info_row">
                        <label>phone</label>
                        <a href="#"><span>154854654</span></a>
                    </div>
                    <div class="contacts__info_row">
                        <label>mail</label>
                        <a href="mailto:secttatto2@icloud.com"><span>secttattoo2@icloud.com</span></a>
                    </div>
                    <div class="contacts__info_social">
                        <a href="#" target="_blank"><span>instagram</span></a>
                        <a href="#" target="_blank"><span>facebook</span></a>
                    </div>
                </div>
            </div>

            <div class="contacts__img"></div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                text: {
                    top: 'keep in touch with me',
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
    .contacts
        position: relative
        background: $black
        +flex_fs_s
        &:before
            content: ''
            position: absolute
            bottom: 0
            left: 0
            width: 100%
            height: 300px
            z-index: -1
            background: $red


        &__left
            width: calc(60% - 70px)
            max-width: 600px
            color: white
            text-align: justify
            padding-top: 50px
            +flex_sb_fs
            flex-direction: column

        &__form
            width: 100%
            box-sizing: border-box
            max-width: 520px
            padding: 3.125rem 0 9rem
            .field
                margin-bottom: 1rem
            p
                font-size: 1.125rem
                font-weight: 700
                letter-spacing: 0.058rem
                span
                    &:not(:last-of-type)
                        margin-right: 10px
            .button
                margin-top: 2rem

            .title
                margin-bottom: 2rem
                font-size: 1.5rem

        &__info
            position: relative
            z-index: 0
            width: 100%
            padding: 3.125rem 0
            max-width: 520px
            &:before
                content: ''
                left: -9999px
                bottom: 0
                height: 100%
                width: calc(9999px + 100% + 13rem)
                position: absolute
                background: $red
                z-index: -1
            a,
            label
                font-size: 1.125rem
                font-weight: 700
                letter-spacing: 0.225rem
                color: $black
                text-decoration: none
            &_row
                +flex_sb_c
                margin-bottom: 2.5rem
            &_social
                +flex_sb_c

        &__img
            background: url('~images/anisa2.jpg') no-repeat center
            position: absolute
            height: 1140px
            left: calc(53% + 70px)
            width: calc(47% - 70px)
            bottom: 0
            background-size: cover
            margin-top: -70px
            z-index: 5


</style>

