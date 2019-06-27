<template>
    <section class="contacts">
        <div class="container">
            <div class="contacts__body">

                <div class="contacts__left">
                    <p class="red justify" v-html="wrapWords(text.top)"></p>

                    <form class="contacts__form">
                        <div class="input">
                            <label class="label">name</label>
                            <input type="text" name="name">
                        </div>
                        <div class="input">
                            <label class="label">e-mail</label>
                            <input type="text" name="mail">
                        </div>
                        <div class="input">
                            <label class="label">text</label>
                            <input type="text" name="message">
                        </div>

                        <button><span><span>send</span></span></button>
                    </form>

                    <div class="contacts__info">
                        <div class="contacts__info_row">
                            <label>phone</label>
                            <a href="#"><span>1 5 4 8 5 4 6 5 4</span></a>
                        </div>
                        <div class="contacts__info_row">
                            <label>mail</label>
                            <a href="mailto:Secttatto2@icloud.com"><span>Secttattoo2@icloud.com</span></a>
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

        &__left
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
        &__img
            background: url('~images/anisa2.jpg') no-repeat center
            position: absolute
            left: calc(50% + 70px)
            top: -70px
            height: 1071px
            width: calc(50% - 70px)
            background-size: cover




</style>

