<template>
    <div>
        <main-screen v-parallax=".25"/>

        <bio/>

        <works/>

        <contacts/>

        <questions/>
    </div>
</template>

<script>
    import MainScreen from '@screens/Main'
    import Bio from '@screens/Bio'
    import Works from '@screens/Works'
    import Contacts from '@screens/Contacts'
    import Questions from '@screens/Questions'

    export default {
        components: {
            MainScreen,
            Bio,
            Works,
            Contacts,
            Questions,
        },
    }
</script>


