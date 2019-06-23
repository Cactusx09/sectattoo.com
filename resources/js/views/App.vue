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
        font-size: 16px
        font: 16px 'Century Gothic', Helvetica, Helvetica Neue, Arial
        cursor: default
        position: relative

    .container
        max-width: 975px
        width: 100%
        padding-left: 15px
        padding-right: 15px
        margin-left: auto
        margin-right: auto


    .header
        position: absolute
        left: 0
        right: 0
        top: 0
        bottom: 0
        &__nav
            a
                font-size: 1.125rem
                font-weight: 700
                line-height: 2.67
</style>

