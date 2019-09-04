
require('./bootstrap');

window.Vue = require('vue');

//layouts
Vue.component('home', require('./layouts/Home.vue').default);

//components
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('sidebar', require('./components/SideBar.vue').default);

//views
Vue.component('don-vi', require('./views/DonVi.vue').default);
Vue.component('du-an', require('./views/DuAn.vue').default);

import VueRouter from 'vue-router'
import { routes }  from './index';

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes
})

const app = new Vue({
    el: '#app',
    router
});
