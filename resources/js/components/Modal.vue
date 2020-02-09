<template>
    <div class="modal">
        <div class="container">
            <div class="body">
                <div class="image" :style="`background-image: url(${image.thumbUrl})`"></div>
                <div class="info">
                    <h3>{{ image.name }}</h3>
                    <p>{{ image.notes }}</p>

                    <a href="#"
                        class="red justify"
                        v-html="wrapWords('for more detail contact me')"
                        @click.prevent="$emit('more-details')">
                    </a>
                </div>


                <div
                    class="close"
                    @click="$emit('close')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001">
                        <path d="M284.286 256.002L506.143 34.144c7.811-7.811 7.811-20.475 0-28.285-7.811-7.81-20.475-7.811-28.285 0L256 227.717 34.143 5.859c-7.811-7.811-20.475-7.811-28.285 0-7.81 7.811-7.811 20.475 0 28.285l221.857 221.857L5.858 477.859c-7.811 7.811-7.811 20.475 0 28.285a19.938 19.938 0 0014.143 5.857 19.94 19.94 0 0014.143-5.857L256 284.287l221.857 221.857c3.905 3.905 9.024 5.857 14.143 5.857s10.237-1.952 14.143-5.857c7.811-7.811 7.811-20.475 0-28.285L284.286 256.002z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props: {
            id: {
                type: Number,
                required: true,
            },
        },

        data() {
            return {
                image: {},
            }
        },

        created() {
            axios.get('/api/v1/works/modal', {
                    params: {
                        id: this.id,
                    },
                })
                .then(({ data }) => {
                    this.image = data
                })
        },

        methods: {
            wrapWords(str, tmpl) {
                return str.replace(/[\w-',.!:]+/g, tmpl || '<span>$&</span>');
            },
        },
    }
</script>

<style lang="sass" scoped>
.modal
    position: fixed
    left: 0
    top: 0
    width: 100%
    height: 100%
    background: black
    z-index: 999
    +flex_fs_s
.container
    height: 100%
    +flex_fs_s
.body
    +flex_sb_s
    position: relative
    padding: 2rem
    width: 100%
.image
    max-width: calc(100% - 375px)
    width: 100%
    background-size: cover
    background-position: center
    background-repeat: no-repeat
.info
    width: 300px
    padding-top: 4rem
    +flex_sb_s
    flex-direction: column
    h3
        color: #ffffff
        font-size: 1.5rem
        letter-spacing: .3rem
        font-weight: 400
    p
        color: rgba(#fff, 0.5)
        letter-spacing: .2rem
        line-height: 1.5
        margin-bottom: auto
    .red
        font-size: 1.125rem
        letter-spacing: .15rem
        font-weight: 700
        text-decoration: none
.close
    position: absolute
    right: 0
    top: 2rem
    display: flex
    width: 2.1875rem
    cursor: pointer
    svg
        width: 100%
        path
            fill: #fff

</style>
