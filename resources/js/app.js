import Vue from 'vue'
import VueRouter from 'vue-router'

import Routes from '@/js/routes/index.js'
import App from '@/js/views/App'

Vue.use(VueRouter)

const app = new Vue({
    el: '#app',
    router: Routes,
    render: h => h(App),
})

export default app
