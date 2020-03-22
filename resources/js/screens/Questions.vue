<template>
    <section class="questions">
        <div class="container">
            <div class="questions__title red">
                <span>Q</span>
                <span>u</span>
                <span>e</span>
                <span>s</span>
                <span>t</span>
                <span>i</span>
                <span>o</span>
                <span>n</span>
                <span>s</span>
            </div>

            <div data-aos
                data-aos-id="questions-body"
                data-aos-top-offset="290"
                data-aos-bottom-offset="200"
                class="questions__body">
                <div class="questions__names">
                    <p v-for="(question, index) in questions" :key="question.id">
                        <span @click="setQuestionAnime(question, index)"
                            :class="{ '_active': selectedQuestion.index === index }">
                            {{ question.title }}
                        </span>
                    </p>
                </div>
                <div class="questions__text">
                    {{ selectedQuestion.text }}
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
                title: 'Questions',
                questions: [],
                selectedQuestion: {
                    text: '',
                    index: 0,
                },
            }
        },

        created() {
            axios.get('/api/v1/questions')
                .then(({ data }) => {
                    this.questions = data;

                    this.selectedQuestion = {
                        text: this.questions[0].text,
                        index: 0,
                    }
                })
        },

        mounted() {
            document.addEventListener('aos:in:questions-body', () => {
                this.$anime.remove('.questions__names p, .questions__title span, .questions__text')
                this.$anime({
                    targets: '.questions__names p',
                    opacity: [0, 1],
                    translateX: [-50, 0],
                    duration: 2000,
                    delay: this.$anime.stagger(50, { from: 'first' }),
                })

                this.$anime({
                    targets: '.questions__title span',
                    opacity: [0, 1],
                    translateX: [-35, 0],
                    duration: 2000,
                    delay: this.$anime.stagger(100, { from: 'first' }),
                })

                this.$anime({
                    targets: '.questions__text',
                    opacity: 1,
                    duration: 3000,
                    delay: 2000,
                })
            })
            document.addEventListener('aos:out:questions-body', () => {
                this.$anime.remove('.questions__names p, .questions__title span, .questions__text')
                this.$anime({
                    targets: '.questions__names p',
                    translateX: [0, 50],
                    opacity: [1, 0],
                    delay: this.$anime.stagger(250, { from: 'first' }),
                    duration: 2000,
                })

                this.$anime({
                    targets: '.questions__title span',
                    opacity: 0,
                    translateX: [0, 35],
                    duration: 1000,
                    delay: this.$anime.stagger(100, { from: 'first' }),
                })

                this.$anime({
                    targets: '.questions__text',
                    opacity: 0,
                    duration: 1000,
                    easing: 'linear',
                })
            })
        },

        methods: {
            setQuestionAnime(question, index) {
                this.$anime.remove('.questions__text')

                this.selectedQuestion = {
                    text: question.text,
                    index,
                }
                this.$emit('set-questions')


                this.$anime({
                    targets: '.questions__text',
                    translateX: [-30, 0],
                    translateZ: 0,
                    easing: 'spring(10, 80, 30, 10)',
                })

                this.$anime({
                    targets: '.questions__text',
                    opacity: [0, 1],
                    textShadow: [
                        '0px 0px 0px rgba(36.5%, 91%, 89.8%, 0), 0px 0px 0px rgba(95.7%, 30.2%, 60.8%, 0)',
                        '15px 0px 0px rgba(36.5%, 91%, 89.8%, 1), 7px 0px 0px rgba(95.7%, 30.2%, 60.8%, 1)',
                        '-7px 0px 0px rgba(36.5%, 91%, 89.8%, 1), -15px 0px 0px rgba(95.7%, 30.2%, 60.8%, 1)',
                        '0px 0px 0px rgba(36.5%, 91%, 89.8%, 0), 0px 0px 0px rgba(95.7%, 30.2%, 60.8%, 0)',
                    ],
                    easing: 'linear',
                    duration: 2000,
                })
            },
        },
    }
</script>

<style lang="sass">
    .questions
        background: $black
        padding: 7rem 0
        +mq($max: 900px)
            padding: 5rem 0
        +mq($max: 720px)
            padding: 4rem 0
        +mq($max: 600px)
            padding: 3rem 0

        &__title
            color: #cb1515
            font-size: 1.5rem
            font-weight: 700
            margin-bottom: 2rem
            letter-spacing: .65rem
            +mq($max: 600px)
                margin-bottom: 0.7rem
                letter-spacing: 0.6rem
                font-size: 1.4rem
            span
                opacity: 0
                +mq($max: 720px)
                    opacity: 1

        &__body
            +flex_sb_fs
            +mq($max: 900px)
                flex-wrap: wrap

        &__names
            min-height: 250px
            +mq($max: 900px)
                min-height: 0
            p
                +mq($max: 720px)
                    opacity: 1
                +line_through_hover($white, $weight: 1px)
            span
                display: inline-block
                cursor: pointer
                user-select: none
                font-size: 1.125rem
                font-weight: 700
                letter-spacing: 0.028rem
                margin-bottom: 1.2rem
                color: rgba(#ffffff, .4)
                +mq($max: 900px)
                    margin-bottom: 0.5rem
                &._active
                    color: #ffffff
                    cursor: default
                    &:before,
                    &:after
                        opacity: 0 !important

        &__text
            color: #ffffff
            font-size: 1.125rem
            line-height: 3rem
            letter-spacing: 0.028rem
            width: 50%
            text-align: justify
            +mq($max: 900px)
                width: 100%
            +mq($max: 720px)
                opacity: 1
            +mq($max: 600px)
                font-size: 1rem
                line-height: 2.2


</style>

