import VueRouter from 'vue-router'
import { routes } from './index';
import BootstrapVue from 'bootstrap-vue'

import VueAuth from '@websanova/vue-auth';
import auth from './auth';
import VueAxios from 'vue-axios';
import axios from 'axios';

require('./bootstrap');
window.Vue = require('vue');
window.EventBus = new Vue();

Vue.use(VueRouter)
Vue.use(BootstrapVue)


const router = new VueRouter({
    mode: 'hash',
    linkExactActiveClass: 'open active',
    routes
})
Vue.router = router

Vue.use(VueAxios, axios);
//Vue.axios.defaults.baseURL = document.head.querySelector('meta[name="api-base-url"]').content;
Vue.use(VueAuth, auth);

const app = new Vue({
    el: '#app',
    user: window.__user__,
    router
});
