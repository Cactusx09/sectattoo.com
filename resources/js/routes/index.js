import Vue from 'vue';
import VueRouter from 'vue-router';

import Main from '@/js/screens/Main';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'main',
            component: Main,
        },
    ]
});

export default router;
