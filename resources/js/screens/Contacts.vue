<template>
    <section class="contacts">
        <div class="container">
            <div class="contacts__body">
                <div class="contacts__left">
                    <form data-aos
                        data-aos-id="contacts-form"
                        data-aos-top-offset="450"
                        data-aos-bottom-offset="-500"
                        autocomplete="off"
                        class="contacts__form">
                        <p class="red justify title" v-html="wrapWords(text.top)"></p>
                        <div :class="['field', { '_has_error': errors.name && !formData.name }]">
                            <label class="label label_name" v-html="wrapWords('n a m e')"></label>
                            <input v-model="formData.name"
                                class="input" type="text" name="name"
                                @focus="focusFieldAnime('name')"
                                @blur="blurFieldAnime('name')"/>
                        </div>
                        <div :class="['field', { '_has_error': errors.mail && !formData.mail }]">
                            <label class="label label_mail" v-html="wrapWords('e - m a i l')"></label>
                            <input v-model="formData.mail"
                                autocomplete="off"
                                class="input" type="text" name="mail"
                                @focus="focusFieldAnime('mail')"
                                @blur="blurFieldAnime('mail')"/>
                        </div>
                        <div :class="['field', { '_has_error': errors.message && !formData.message }]">
                            <label class="label label_message" v-html="wrapWords('t e x t')"></label>
                            <textarea
                                v-model="formData.message"
                                class="textarea" name="message"
                                @focus="focusFieldAnime('message')"
                                @blur="blurFieldAnime('message')"/>
                        </div>

                        <button
                            class="button"
                            @click.prevent="validate()">
                            <span><span>send</span></span>
                        </button>

                        <div class="sending" v-html="wrapWords('s e n d i n g ...')"></div>
                        <div class="sent">
                            <span>s</span>
                            <span>e</span>
                            <span>n</span>
                            <span>t</span>
                            <span>✓</span>
                        </div>
                    </form>

                    <div class="contacts__info">
                        <div class="contacts__info_row">
                            <label>phone</label>
                            <a href="#"><span>{{ texts.phone.value }}</span></a>
                        </div>
                        <div class="contacts__info_row">
                            <label>mail</label>
                            <a :href="`mailto:${texts.mail.value}`"><span>{{ texts.mail.value }}</span></a>
                        </div>
                        <div data-aos
                            data-aos-id="contacts-info"
                            data-aos-top-offset="190"
                            data-aos-bottom-offset="200"
                            class="contacts__info_social">
                            <a :href="texts.instagram.value" target="_blank"><span>instagram</span></a>
                            <a :href="texts.facebook.value" target="_blank"><span>facebook</span></a>
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
        props: {
            texts: {
                type: Object,
            },
        },

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
                errors: {},
            }
        },

        mounted() {
            document.addEventListener('aos:in:contacts-form', () => {
                this.$anime.remove('.contacts__form .field, .contacts__form .red span, .contacts__form .button')
                this.$anime.timeline()
                    .add({
                        targets: '.contacts__form .red span',
                        opacity: [0, 1],
                        translateX: [-35, 0],
                        duration: 2000,
                        delay: this.$anime.stagger(150, { from: 'first' }),
                    })
                    .add({
                        targets: '.contacts__form .field, .contacts__form .button',
                        translateY: [-30, 0],
                        opacity: [0, 1],
                        duration: 3000,
                        delay: (el, i) => i * 200,
                    }, 500)
            })
            document.addEventListener('aos:out:contacts-form', () => {
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
                        delay: this.$anime.stagger(150, { from: 'last' }),
                    }, 500)
            })


            document.addEventListener('aos:in:contacts-info', () => {
                this.$anime.remove('.contacts__info_red')
                this.$anime({
                    targets: '.contacts__info_red',
                    opacity: [0, 1],
                    translateY: [-100, 0],
                    duration: 2000,
                })
            })
            document.addEventListener('aos:out:contacts-info', () => {
                this.$anime.remove('.contacts__info_red')
                this.$anime({
                    targets: '.contacts__info_red',
                    translateY: [0, 100],
                    opacity: 0,
                    duration: 2000,
                })
            })



            document.addEventListener('aos:in:contacts-imgs', () => {
                this.$anime.remove('.contacts__imgs_img')
                this.$anime({
                    targets: '.contacts__imgs_img',
                    opacity: [0, 1],
                    duration: 5000,
                    delay: this.$anime.stagger(100, { from: 'first' }),
                })
            })
            document.addEventListener('aos:out:contacts-imgs', () => {
                this.$anime.remove('.contacts__imgs_img')
                this.$anime({
                    targets: '.contacts__imgs_img',
                    opacity: 0,
                    duration: 3000,
                    delay: this.$anime.stagger(120, { from: 'center' }),
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
                    duration: 100,
                    scale: 0.7,
                    letterSpacing: '.2rem',
                    color: '#cb1515',
                    easing: 'linear',
                    delay: this.$anime.stagger(70, { from: 'first' }),
                })
            },
            blurFieldAnime(fieldName) {
                this.$anime.remove(`.label_${fieldName} span`)

                if (this.formData[fieldName]) {
                    this.$anime({
                        targets: `.label_${fieldName} span`,
                        color: '#626262',
                        duration: 200,
                        easing: 'linear',
                        delay: this.$anime.stagger(50, { from: 'last' }),
                    })
                } else {
                    this.$anime({
                        targets: `.label_${fieldName} span`,
                        translateY: 0,
                        duration: 200,
                        scale: 1,
                        letterSpacing: '.7rem',
                        easing: 'linear',
                        color: '#626262',
                        delay: this.$anime.stagger(50, { from: 'last' }),
                    })
                }
            },
            validate() {
                let hasErrors = false;
                Object.entries(this.formData).forEach(([key, value]) => {
                    if (!value) hasErrors = true
                    this.$set(this.errors, key, !value)
                })

                if (!hasErrors) this.send()
            },
            send() {
                this.$anime({
                    targets: '.sending span',
                    translateX: [-25, 0],
                    duration: 200,
                    opacity: [0, 1],
                    color: '#cb1515',
                    easing: 'linear',
                    loop: true,
                    delay: this.$anime.stagger(100, { from: 'first' }),
                })

                axios.post('/api/v1/send', this.formData).then(({ data }) => {
                    this.$anime.remove('.sending span')
                    this.$anime.timeline()
                        .add({
                            targets: '.sending span',
                            translateX: [0, -25],
                            duration: 100,
                            opacity: 0,
                            color: '#fff',
                            easing: 'linear',
                            delay: this.$anime.stagger(100, { from: 'first' }),
                        })
                        .add({
                            targets: '.sent',
                            opacity: 1,
                            duration: 500,
                        }, 200)
                        .add({
                            targets: '.sent span',
                            translateX: [-25, 0],
                            duration: 300,
                            opacity: [0, 1],
                            color: '#fff',
                            easing: 'linear',
                            delay: this.$anime.stagger(150, { from: 'first' }),
                        }, 300)
                        .add({
                            targets: '.sent',
                            opacity: 0,
                            duration: 500,
                            delay: 1300,
                            complete: () => {
                                this.reset()
                            },
                        })
                })
            },
            reset() {
                Object.keys(this.formData).forEach((key) => {
                    this.formData[key] = null
                    this.errors[key] = false
                    this.blurFieldAnime(key);
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
        +mq($max: 900px)
            flex-wrap: wrap

        &__left
            width: calc(60% - 70px)
            max-width: 600px
            color: white
            text-align: justify
            padding-top: 50px
            +flex_sb_fs
            flex-direction: column
            +mq($max: 1120px)
                width: calc(60% - 35px)
                max-width: 650px
            +mq($max: 900px)
                max-width: none
                width: 100%
            +mq($max: 600px)
                padding-top: 0

        &__form
            width: 100%
            box-sizing: border-box
            max-width: 520px
            padding-top: 3.125rem
            margin-bottom: 9rem
            position: relative
            +mq(900px, 1120px)
                max-width: 620px
            +mq($max: 900px)
                max-width: none
                padding-top: 2rem
                margin-bottom: 6rem
            +mq($max: 600px)
                margin-bottom: 4rem
            .field
                margin-bottom: 1rem
                opacity: 0
                +mq($max: 720px)
                    opacity: 1
                .input
                    +mq($max: 600px)
                        min-height: 70px

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
                +mq($max: 720px)
                    opacity: 1
                +mq($max: 600px)
                    margin-top: 1rem
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
                +mq($max: 500px)
                    margin-bottom: 1rem
                span
                    opacity: 0
                    +mq($max: 720px)
                        opacity: 1
            .sending,
            .sent
                position: absolute
                left: 0
                bottom: -50px
                letter-spacing: .2rem
                span
                    opacity: 0

        &__info
            position: relative
            z-index: 0
            width: 100%
            padding: 3.125rem 0
            max-width: 520px
            +mq($max: 900px)
                max-width: none

            &_red
                left: -1999px
                bottom: 0
                height: 100%
                width: calc(1999px + 100% + 1299px)
                position: absolute
                background: $red
                z-index: -1
                opacity: 0
                +mq($max: 720px)
                    opacity: 1
                    width: calc(100% + 4rem)
                    left: -2rem
            a,
            label
                font-size: 1.125rem
                font-weight: 700
                letter-spacing: 0.225rem
                color: $black
                text-decoration: none
                +mq($max: 600px)
                    font-size: 1rem
                    letter-spacing: 0.2rem
            a
                +line_through_hover($black, $weight: 1px)
            &_row
                +flex_sb_c
                margin-bottom: 2.5rem
                +mq($max: 600px)
                    margin-bottom: 1.5rem
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
            +mq($max: 900px)
                position: relative
                left: 0
                margin-top: 0
                width: 100%
            +mq($max: 840px)
                width: calc(100% + 50px)
                left: -25px
            +mq($max: 720px)
                display: none

            &_bg
                position: absolute
                height: 100%
                bottom: 0
                z-index:  0
                +mq(1120px, 1280px)
                    margin-left: -110px
                +mq(1000px, 1120px)
                    margin-left: -140px
                +mq(900px, 1000px)
                    margin-left: -170px
                +mq(640px, 720px)
                    margin-left: -20px
                +mq(550px, 640px)
                    margin-left: -60px
                +mq(450px, 550px)
                    margin-left: -90px
                +mq($max: 450px)
                    margin-left: -160px

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

