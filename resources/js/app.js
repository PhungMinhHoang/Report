import VueRouter from 'vue-router'
import { routes }  from './index';
import BootstrapVue from 'bootstrap-vue'

require('./bootstrap');
window.Vue = require('vue');
window.EventBus = new Vue();

Vue.use(VueRouter)
Vue.use(BootstrapVue)
const router = new VueRouter({
    mode: 'hash',
    routes
})

const app = new Vue({
    el: '#app',
    router
});
