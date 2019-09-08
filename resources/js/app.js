import VueRouter from 'vue-router'
import { routes }  from './index';
import BootstrapVue from 'bootstrap-vue'

require('./bootstrap');
window.Vue = require('vue');

//layouts
Vue.component('home', require('./layouts/Home.vue').default);

//components
Vue.component('data-table', require('./components/DataTable.vue').default);

//views
Vue.component('don-vi', require('./views/DonVi.vue').default);
Vue.component('du-an', require('./views/DuAn.vue').default);


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
