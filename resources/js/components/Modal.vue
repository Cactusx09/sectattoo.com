<template>
    <div class="modal">
        <div class="container">
            <div class="body">
                <div class="image">
                    <img :src="image.thumbUrl">
                </div>
                <div class="info">
                    <h3>{{ image.name }}</h3>
                    <p>{{ image.notes }}</p>
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
.body
    background: red
</style>
