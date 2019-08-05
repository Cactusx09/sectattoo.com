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
        user-select: none
        overflow-x: hidden

    .container
        max-width: 1100px
        width: 100%
        padding-left: 15px
        padding-right: 15px
        margin-left: auto
        margin-right: auto
        box-sizing: border-box

    .red
        color: $red
    .justify
        +flex_sb_fe

    .field
        position: relative
        font-size: 1.125rem
        font-weight: 700
        line-height: 2.67
        letter-spacing: 1.55rem
        .label
            color: $gray
            position: absolute
            left: 0
            bottom: 30px
            line-height: 1
            pointer-events: none
        .input,
        .textarea
            display: block
            width: 100%
            background: none
            border: none
            outline: none
            line-height: 1.5
            min-height: 80px
            letter-spacing: 0.3rem
        .textarea
            min-height: 150px
        &:before
            content: ''
            position: absolute
            left: 0
            bottom: 0
            height: 2px
            width: 100%
            background: #e6e6e6

    .button
        background: none
        border: none
        outline: none
        width: 100%
        padding: 0
        cursor: pointer
        >span
            +flex_fs_c
            border-bottom: 2px solid $red
            font-size: 1.5rem
            font-weight: 700
            line-height: 2
            letter-spacing: 4.2rem
            color: $red
            padding-bottom: 20px



    .header
        position: absolute
        left: 0
        top: 0
        width: 100%
        padding-top: 5vh
        z-index: 5
        &__nav
            +flex_fs_c
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

