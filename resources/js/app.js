require('./bootstrap');
import Vue from 'vue';
import router from "./router.js";
//include vue
//components
Vue.component('admin',require('./pages/admin/dashboard.vue').default);
//initialize vue
const app = new Vue({
    el: '#app',
    router
});
