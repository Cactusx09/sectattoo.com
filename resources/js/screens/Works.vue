<template>
    <section class="works">
        <div class="container">
            <div class="works__filter">
                <a href="#"><span>all works</span></a>
                <a href="#"><span>sketch</span></a>
                <a href="#"><span>tattoo</span></a>
                <a href="#"><span>art</span></a>
                <a href="#"><span>text me</span></a>
            </div>
            <div class="works__body">
                <div class="works__col">
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/405/469')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/415/469')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/405/479')"></a>
                </div>
                <div class="works__col">
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/408/499')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/425/489')"></a>
                </div>
                <div class="works__col">
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/444/449')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/433/465')"></a>
                    <a href="#" class="works__item" style="background-image: url('http://placekitten.com/422/479')"></a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from 'axios'

    export default {
        mounted() {
            axios.get('/api/v1/works').then((data) => {
                console.log(data);
            });
        }
    }
</script>

<style lang="sass">
    .works
        padding-top: 240px
        .container
            max-width: 1550px
        &__filter
            +flex_sb_c
            max-width: 1140px
            margin-left: auto
            margin-right: auto
            margin-bottom: 70px
            a
                font-size: 1.5rem
                font-weight: 700
                line-height: 2
                letter-spacing: 0.3rem
                color: $black
                text-decoration: none

        &__body
            +flex_sb_fs
        &__col
            width: calc(33.3333% - 25px)
            +flex_sb_c
            flex-direction: column

            &:nth-of-type(1)
                .works__item
                    margin-bottom: 120px
                    &:nth-of-type(2n - 1)
                        margin-left: 35px
                    &:nth-of-type(2n)
                        margin-left: auto
                    &:nth-of-type(3n)
                        margin-right: auto

            &:nth-of-type(2)
                .works__item
                    margin-bottom: 290px
                    &:nth-of-type(2n - 1)
                        margin-top: 135px
                    &:nth-of-type(2n)
                        margin-left: 7px
                    &:nth-of-type(3n)
                        margin-right: 7px

            &:nth-of-type(3)
                .works__item
                    margin-bottom: 65px
                    &:nth-of-type(2n - 1)
                        margin-left: 60px
                    &:nth-of-type(2n)
                        margin-right: auto
                    &:nth-of-type(3n)
                        margin-left: auto


        &__item
            width: 82%
            height: 469px
            background-repeat: no-repeat
            background-size: cover
            background-position: center
            display: block
            filter: grayscale(1)


</style>

