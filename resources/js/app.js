import VueRouter from 'vue-router'
import { routes }  from './index';
//Font-Awesome
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlusSquare } from '@fortawesome/free-solid-svg-icons'

library.add(faPlusSquare)
require('./bootstrap');
window.Vue = require('vue');

//layouts
Vue.component('home', require('./layouts/Home.vue').default);

//components
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('sidebar', require('./components/SideBar.vue').default);
Vue.component('data-table', require('./components/DataTable.vue').default);

//views
Vue.component('don-vi', require('./views/DonVi.vue').default);
Vue.component('du-an', require('./views/DuAn.vue').default);

//font-awesome
Vue.component('font-awesome-icon', FontAwesomeIcon);




Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'hash',
    routes
})

const app = new Vue({
    el: '#app',
    router
});
