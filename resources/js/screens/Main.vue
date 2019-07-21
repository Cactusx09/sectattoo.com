<template>
    <main class="main">
        <div class="main__logo">
            <img class="main__logo_bold" src="@images/letters/s.png">
            <img class="main__logo_bold" src="@images/letters/e.png">
            <img class="main__logo_bold" src="@images/letters/c.png">
            <img class="main__logo_bold" src="@images/letters/t.png">
            <img class="main__logo_tat" src="@images/letters/tat.png">
            <img src="@images/letters/t2.png">
            <img src="@images/letters/o.png">
            <img src="@images/letters/o.png">
        </div>
    </main>
</template>

<script>
    import axios from 'axios'

    export default {
    }
</script>

<style lang="sass">
    .main
        background: url('~images/bg/main.jpg') no-repeat center
        background-size: cover
        min-height: 100vh
        +flex_c_c

        &__logo
            +flex_c_c
            img
                &:not(:last-of-type)
                    margin-right: 3.9rem
            &_tat
                margin-top: 2.4rem
            &_bold
                margin-bottom: 0.5rem

</style>

