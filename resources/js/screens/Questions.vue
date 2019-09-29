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
                data-aos-top-offset="390"
                data-aos-bottom-offset="200"
                class="questions__body">
                <div class="questions__names">
                    <p v-for="(question, index) in questions" :key="question.id">
                        <span @click="setQuestionAnime(question, index)"
                            :class="{ '_active': selectedQuestion.index === index }">
                            {{ question.name }}
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
    export default {
        data() {
            return {
                title: 'Questions',
                questions: [
                    {
                        name: 'Does It Hurt?',
                        text: 'This is number one in our Frequently Asked Questions simply because it is surprisingly just that. The simple answer is, yes it does. However, not as much as some people might like you to believe, as after a short period of time your body’s natural pain-killers (endorphins), kick in and make things much more manageable. How long these endorphins last usually defines your natural ‘limit’ as to how long a tattoo session you can handle (usually between 2-3 hours), after this time you will tend to become very uncomfortable.',
                    },
                    {
                        name: 'How long does a tattoo take?',
                        text: 'After this time you will tend to become very uncomfortable.',
                    },
                    {
                        name: 'How much does it cost?',
                        text: 'Asked Questions simply because it is surprisingly just that. The simple answer is, yes it does. However, not as much as some people might like you to believe, as after a short period of time your body’s natural pain-killers (endorphins), kick in and make things much more manageable. How long these endorphins last usually defines your natural ‘limit’ as to how long a tattoo session you can handle (usually between 2-3 hours), after this time you will tend to become very uncomfortable.',
                    },
                    {
                        name: 'Can I use numbing cream or pain killers?',
                        text: 'Simply because it is surprisingly just that. The simple answer is, yes it does. However, not as much as some people might like you to believe, as after a short period of time your body’s natural pain-killers (endorphins), kick in and make things much more manageable. How long these endorphins last usually defines your natural ‘limit’ as to how long a tattoo session you can handle (usually between 2-3 hours), after this time you will tend to become very uncomfortable.',
                    },
                    {
                        name: 'Can tattoo’s be removed?',
                        text: 'Frequently Asked Questions simply because it is surprisingly just that. The simple answer is, yes it does. However, not as much as some people might like you to believe, as after a short period of time your body’s natural pain-killers (endorphins), kick in and make things much more manageable. How long these endorphins last usually defines your natural ‘limit’ as to how long a tattoo session you can handle (usually between 2-3 hours), after this time you will tend to become very uncomfortable.',
                    },
                    {
                        name: 'How much does it cost?',
                        text: 'This is number one e very uncomfortable.',
                    },
                    {
                        name: 'Can I use numbing cream or pain killers?',
                        text: 'However, not as much as some people might like you to believe, as after a short period of time your body’s natural pain-killers (endorphins), kick in and make things much more manageable. How long these endorphins last usually defines your natural ‘limit’ as to how long a tattoo session you can handle (usually between 2-3 hours), after this time you will tend to become very uncomfortable.',
                    },
                    {
                        name: 'Can tattoo’s be removed?',
                        text: 'As much as some people might like you to believe, as after a short period of time your body’s natural pain-killers (endorphins), kick in and make things much more manageable. How long these endorphins last usually defines your natural ‘limit’ as to how long a tattoo session you can handle (usually between 2-3 hours), after this time you will tend to become very uncomfortable.',
                    },
                ],
                selectedQuestion: {
                    text: '',
                    index: 0,
                },
            }
        },

        created() {
            this.selectedQuestion = {
                text: this.questions[0].text,
                index: 0,
            }
        },

        mounted() {
            document.addEventListener('aos:in:questions-body', ({detail}) => {
                this.$anime.remove('.questions__names p, .questions__title span, .questions__text')
                this.$anime({
                    targets: '.questions__names p',
                    opacity: [0, 1],
                    translateX: [-50, 0],
                    duration: 2000,
                    delay: this.$anime.stagger(50, {from: 'first'}),
                })

                this.$anime({
                    targets: '.questions__title span',
                    opacity: [0, 1],
                    translateX: [-35, 0],
                    duration: 2000,
                    delay: this.$anime.stagger(100, {from: 'first'}),
                })

                this.$anime({
                    targets: '.questions__text',
                    opacity: 1,
                    duration: 3000,
                    delay: 2000,
                })
            })
            document.addEventListener('aos:out:questions-body', ({detail}) => {
                this.$anime.remove('.questions__names p, .questions__title span, .questions__text')
                this.$anime({
                    targets: '.questions__names p',
                    translateX: [0, 50],
                    opacity: [1, 0],
                    delay: this.$anime.stagger(250, {from: 'first'}),
                    duration: 2000,
                })

                this.$anime({
                    targets: '.questions__title span',
                    opacity: 0,
                    translateX: [0, 35],
                    duration: 1000,
                    delay: this.$anime.stagger(100, {from: 'first'}),
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
                    index: index,
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
        &__title
            color: #cb1515
            font-size: 1.5rem
            font-weight: 700
            margin-bottom: 2rem
            letter-spacing: .65rem
            span
                opacity: 0

        &__body
            +flex_sb_fs

        &__names
            p
                opacity: 0
            span
                display: block
                cursor: pointer
                user-select: none
                font-size: 1.125rem
                font-weight: 700
                letter-spacing: 0.028rem
                margin-bottom: 1.6em
                color: rgba(#ffffff, .4)
                &._active
                    color: #ffffff

        &__text
            color: #ffffff
            font-size: 1.125rem
            line-height: 3rem
            letter-spacing: 0.028rem
            width: 50%
            text-align: justify
            opacity: 0


</style>

