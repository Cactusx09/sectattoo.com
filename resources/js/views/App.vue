<template>
    <div class="app">
        <header class="header">
            <div class="container">
                <nav class="header__nav">
                    <a href="#"><span>about me</span></a>
                    <a href="#"><span>my works</span></a>
                    <a href="#"><span>FAQ</span></a>
                </nav>
            </div>
        </header>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
    }
</script>

<style lang="sass">
    @import '/fonts/fonts.css'
    @import 'resources/sass/web/reset.sass'

    .app
        font: 16px 'Century Gothic', Helvetica, Helvetica Neue, Arial
        cursor: default
        position: relative
        color: $black

    .container
        max-width: 1100px
        width: 100%
        padding-left: 15px
        padding-right: 15px
        margin-left: auto
        margin-right: auto
        box-sizing: border-box


    .header
        position: absolute
        left: 0
        top: 0
        width: 100%
        padding-top: 5vh
        &__nav
            a
                font-size: 1.125rem
                color: $white
                text-decoration: none
                letter-spacing: 0.028rem
                font-weight: 700
                line-height: 2.67
                &:not(:last-of-type)
                    margin-right: 6rem
</style>

