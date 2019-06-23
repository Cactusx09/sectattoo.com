<template>
    <main class="main">
        <div class="main__logo">
            <img src="@images/letters/s.png">
            <img src="@images/letters/e.png">
            <img src="@images/letters/c.png">
            <img src="@images/letters/t.png">
            <img src="@images/letters/tat.png">
            <img src="@images/letters/t2.png">
            <img src="@images/letters/o.png">
            <img src="@images/letters/o.png">
        </div>
    </main>
</template>

<script>
    import axios from 'axios'

    export default {
        mounted() {
            axios.get('/api/v1/works').then((data) => {

            });
        }
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


</style>

