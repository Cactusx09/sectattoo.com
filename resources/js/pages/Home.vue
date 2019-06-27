<template>
    <div>
        <main-screen/>

        <bio/>

        <works/>

        <contacts/>
    </div>
</template>

<script>
    import MainScreen from '@screens/Main'
    import Bio from '@screens/Bio'
    import Works from '@screens/Works'
    import Contacts from '@screens/Contacts'

    export default {
        components: {
            MainScreen,
            Bio,
            Works,
            Contacts,
        },
    }
</script>


