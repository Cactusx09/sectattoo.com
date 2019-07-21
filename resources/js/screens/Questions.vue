<template>
    <section class="questions">
        <div class="container">
            <div class="questions__title red justify">Questions</div>

            <div class="questions__body">
                <div class="questions__names">
                    <p v-for="(question, index) in questions" :key="question.id">
                        <span @click="selectedQuestion = {
                                text: question.text,
                                index: index,
                            }"
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
            selectedQuestion = {
                text: questions[0].text,
                index: 0,
            };
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
            letter-spacing: 1.5rem
            margin-bottom: 2rem

        &__body
            +flex_sb_fs

        &__names
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


</style>

