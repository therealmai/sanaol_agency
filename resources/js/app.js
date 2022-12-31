import './bootstrap';
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('users', require('../../vue/src/components/Pagination/UserPagination.vue').default);
Vue.component('users', require('../../vue/src/components/Pagination/ApplyPagination.vue').default);

const app = new Vue({
    el: '#app',
});