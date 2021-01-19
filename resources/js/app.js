require('./bootstrap');
import Vue from 'vue';
import router from "./router.js";
//include vue
//components
Vue.component('mainpage',require('./components/mainpage.vue').default);
//initialize vue
const app = new Vue({
    el: '#app',
    router
});
