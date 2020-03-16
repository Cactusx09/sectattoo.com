<template>
    <div>
        <main-screen/>

        <bio v-if="bio" :bio="bio"/>

        <works v-on="$listeners"/>

        <contacts v-if="texts" :texts="texts"/>

        <questions @set-questions="$emit('set-questions')"/>
    </div>
</template>

<script>
    import axios from 'axios'

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

        data() {
            return {
                bio: null,
                texts: null,
            }
        },

        created() {
            axios.get('/api/v1/texts')
                .then(({ data }) => {
                    this.texts = data
                    this.bio = data.bio.value

                    this.$emit('loaded');
                })
        },
    }
</script>


