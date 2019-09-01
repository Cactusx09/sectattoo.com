import Vue from 'vue'
import VueRouter from 'vue-router'

import Routes from '@/js/routes/index.js'
import App from '@/js/views/App'

import anime from 'animejs'
Object.defineProperty(Vue.prototype, '$anime', { value: anime })

Vue.use(VueRouter)

import AOS from 'aos'
import 'aos/dist/aos.css'


const app = new Vue({
    created() {
        AOS.init({
            container: '.scroll-content',
            easing: 'ease-out-back',
            duration: 2000,
        })
    },
    el: '#app',
    router: Routes,
    render: h => h(App),
})

export default app
