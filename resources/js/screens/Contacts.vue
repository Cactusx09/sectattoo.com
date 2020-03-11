<template>
    <section class="contacts">
        <div class="container">
            <div class="contacts__body">
                <div class="contacts__left">
                    <form data-aos
                        data-aos-id="contacts-form"
                        data-aos-top-offset="450"
                        data-aos-bottom-offset="-500"
                        class="contacts__form">
                        <p class="red justify title" v-html="wrapWords(text.top)"></p>
                        <div class="field">
                            <label class="label label_name">
                                <span>n</span>
                                <span>a</span>
                                <span>m</span>
                                <span>e</span>
                            </label>
                            <input v-model="formData.name"
                                class="input" type="text" name="name"
                                @focus="focusFieldAnime('name')"
                                @blur="blurFieldAnime('name')"/>
                        </div>
                        <div class="field">
                            <label class="label label_mail">
                                <span>e</span>
                                <span>-</span>
                                <span>m</span>
                                <span>a</span>
                                <span>i</span>
                                <span>l</span>
                            </label>
                            <input v-model="formData.mail"
                                class="input" type="text" name="mail"
                                @focus="focusFieldAnime('mail')"
                                @blur="blurFieldAnime('mail')"/>
                        </div>
                        <div class="field">
                            <label class="label label_message">
                                <span>t</span>
                                <span>e</span>
                                <span>x</span>
                                <span>t</span>
                            </label>
                            <textarea
                                v-model="formData.message"
                                class="textarea" name="message"
                                @focus="focusFieldAnime('message')"
                                @blur="blurFieldAnime('message')"/>
                        </div>

                        <button
                            class="button"
                            @click.prevent="send()">
                            <span><span>send</span></span>
                        </button>
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
                        <div data-aos
                            data-aos-id="contacts-info"
                            data-aos-top-offset="190"
                            data-aos-bottom-offset="200"
                            class="contacts__info_social">
                            <a href="#" target="_blank"><span>instagram</span></a>
                            <a href="#" target="_blank"><span>facebook</span></a>
                        </div>

                        <div class="contacts__info_red"></div>
                    </div>
                </div>

                <div data-aos
                    data-aos-id="contacts-imgs"
                    data-aos-top-offset="700"
                    data-aos-bottom-offset="200"
                    class="contacts__imgs">

                    <div class="contacts__imgs_bg">
                        <div class="contacts__imgs_img contacts__imgs_1"><img src="@images/tattoos/1.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_2"><img src="@images/tattoos/2.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_3"><img src="@images/tattoos/3.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_4"><img src="@images/tattoos/4.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_5"><img src="@images/tattoos/5.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_6"><img src="@images/tattoos/6.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_7"><img src="@images/tattoos/7.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_8"><img src="@images/tattoos/8.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_9"><img src="@images/tattoos/9.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_10"><img src="@images/tattoos/10.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_11"><img src="@images/tattoos/11.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_12"><img src="@images/tattoos/12.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_13"><img src="@images/tattoos/13.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_14"><img src="@images/tattoos/14.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_15"><img src="@images/tattoos/15.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_16"><img src="@images/tattoos/16.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_17"><img src="@images/tattoos/17.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_18"><img src="@images/tattoos/18.png"></div>
                        <div class="contacts__imgs_img contacts__imgs_19"><img src="@images/tattoos/19.png"></div>

                        <img class="contacts__imgs_anisa" src="@images/tattoos/anisa.jpg">
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                text: {
                    top: 'keep in touch with me',
                },
                formData: {
                    name: null,
                    mail: null,
                    message: null,
                },
            }
        },

        mounted() {
            document.addEventListener('aos:in:contacts-form', ({detail}) => {
                this.$anime.remove('.contacts__form .field, .contacts__form .red span, .contacts__form .button')
                this.$anime.timeline()
                    .add({
                        targets: '.contacts__form .red span',
                        opacity: [0, 1],
                        translateX: [-35, 0],
                        duration: 2000,
                        delay: this.$anime.stagger(150, {from: 'first'}),
                    })
                    .add({
                        targets: '.contacts__form .field, .contacts__form .button',
                        translateY: [-30, 0],
                        opacity: [0, 1],
                        duration: 3000,
                        delay: (el, i, l) => i * 200,
                    }, 500)
            })
            document.addEventListener('aos:out:contacts-form', ({detail}) => {
                this.$anime.remove('.contacts__form .field, .contacts__form .red span, .contacts__form .button')
                this.$anime.timeline()
                    .add({
                        targets: '.contacts__form .field, .contacts__form .button',
                        translateY: -30,
                        opacity: 0,
                        duration: 2000,
                        delay: (el, i, l) => l - i * 350,
                    })
                    .add({
                        targets: '.contacts__form .red span',
                        opacity: 0,
                        translateX: 35,
                        duration: 1000,
                        delay: this.$anime.stagger(150, {from: 'last'}),
                    }, 500)
            })



            document.addEventListener('aos:in:contacts-info', ({detail}) => {
                this.$anime.remove('.contacts__info_red')
                this.$anime({
                    targets: '.contacts__info_red',
                    opacity: [0, 1],
                    translateY: [-100, 0],
                    duration: 2000,
                })
            })
            document.addEventListener('aos:out:contacts-info', ({detail}) => {
                this.$anime.remove('.contacts__info_red')
                this.$anime({
                    targets: '.contacts__info_red',
                    translateY: [0, 100],
                    opacity: 0,
                    duration: 2000,
                })
            })



            document.addEventListener('aos:in:contacts-imgs', ({detail}) => {
                this.$anime.remove('.contacts__imgs_img')
                this.$anime({
                    targets: '.contacts__imgs_img',
                    opacity: [0, 1],
                    duration: 5000,
                    delay: this.$anime.stagger(100, {from: 'first'}),
                })
            })
            document.addEventListener('aos:out:contacts-imgs', ({detail}) => {
                this.$anime.remove('.contacts__imgs_img')
                this.$anime({
                    targets: '.contacts__imgs_img',
                    opacity: 0,
                    duration: 3000,
                    delay: this.$anime.stagger(120, {from: 'center'}),
                })
            })
        },

        methods: {
            wrapWords(str, tmpl) {
                return str.replace(/[\w-',.!:]+/g, tmpl || '<span>$&</span>');
            },

            focusFieldAnime(fieldName) {
                this.$anime.remove(`.label_${fieldName} span`)

                this.$anime({
                    targets: `.label_${fieldName} span`,
                    translateY: 25,
                    duration: 1000,
                    scale: .7,
                    letterSpacing: '.2rem',
                    color: '#cb1515',
                    delay: this.$anime.stagger(150, {from: 'first'}),
                })
            },
            blurFieldAnime(fieldName) {
                this.$anime.remove(`.label_${fieldName} span`)

                if(this.formData[fieldName]) {
                    this.$anime({
                        targets: `.label_${fieldName} span`,
                        color: '#626262',
                        duration: 2000,
                        delay: this.$anime.stagger(50, {from: 'last'}),
                    })
                } else {
                    this.$anime({
                        targets: `.label_${fieldName} span`,
                        translateY: 0,
                        duration: 1000,
                        scale: 1,
                        letterSpacing: '.7rem',
                        color: '#626262',
                        delay: this.$anime.stagger(150, {from: 'last'}),
                    })
                }
            },
            send() {
                axios.post('/api/v1/send', this.formData).then(({ data }) => {
                    console.log(data)
                    debugger
                })
            },
        },
    }
</script>

<style lang="sass">
    .contacts
        position: relative
        background: $black
        +flex_fs_s


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
                opacity: 0
            p
                font-size: 1.125rem
                font-weight: 700
                letter-spacing: 0.058rem
                span
                    &:not(:last-of-type)
                        margin-right: 10px
            .button
                margin-top: 2rem
                opacity: 0
                >span>span
                    position: relative
                    &:before
                        content: ''
                        position: absolute
                        top: 50%
                        margin-top: 1px
                        left: -2px
                        width: 0px
                        height: 2px
                        background: $red
                        transition: .5s
                        opacity: 0
                    &:after
                        content: ''
                        position: absolute
                        top: 50%
                        margin-top: 1px
                        width: 0px
                        right: 3.6rem
                        height: 2px
                        background: $red
                        transition: .5s
                        opacity: 0
                &:hover
                    >span>span
                        &:before,
                        &:after
                            opacity: 1
                            width: 50%

            .title
                margin-bottom: 2rem
                font-size: 1.5rem
                span
                    opacity: 0

        &__info
            position: relative
            z-index: 0
            width: 100%
            padding: 3.125rem 0
            max-width: 520px
            &_red
                left: -9999px
                bottom: 0
                height: 100%
                width: calc(9999px + 100% + 1999px)
                position: absolute
                background: $red
                z-index: -1
                opacity: 0
            a,
            label
                font-size: 1.125rem
                font-weight: 700
                letter-spacing: 0.225rem
                color: $black
                text-decoration: none
            a
                +line_through_hover($black, $weight: 1px)
            &_row
                +flex_sb_c
                margin-bottom: 2.5rem
            &_social
                +flex_sb_c

        &__imgs
            position: absolute
            height: 1140px
            left: calc(53% + 70px)
            width: calc(48% - 70px)
            bottom: 0
            // background-size: cover
            margin-top: -70px
            overflow: hidden
            &_bg
                position: absolute
                height: 100%
                bottom: 0
                z-index:  0

            &_anisa
                height: 100%

            &_img
                position: absolute
                z-index: 6
                opacity: 0

            &_1
                left: 50.8%
                top: 8.7%
            &_2
                left: 47.6%
                top: 14.5%
            &_3
                left: 44.2%
                top: 24.1%
            &_4
                left: 51.3%
                top: 25.3%
            &_5
                left: 56.3%
                top: 20%
            &_6
                left: 55.2%
                top: 28.7%
            &_7
                left: 47.4%
                top: 30.1%
            &_8
                left: 49.2%
                top: 37.3%
            &_9
                left: 49.4%
                top: 43.3%
            &_10
                left: 45.4%
                top: 48.7%
            &_11
                left: 31.8%
                top: 51.4%
            &_12
                left: 48.8%
                top: 54.6%
            &_13
                left: 52.9%
                top: 69.6%
            &_14
                left: 54.1%
                top: 78%
            &_15
                left: 54.9%
                top: 80.6%
            &_16
                left: 54.9%
                top: 83.7%
            &_17
                left: 25.4%
                top: 68.2%
            &_18
                left: 46.7%
                top: 54.7%
            &_19
                left: 48%
                top: 55.1%

</style>

