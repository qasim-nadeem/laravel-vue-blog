require('./bootstrap');
import Vue from 'vue';
import router from "./router.js";
import store from './dataStore';
import common from "./common.js";
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
import locale  from 'view-design/dist/locale/en-US';

Vue.use(ViewUI,{ locale  });
Vue.mixin(common);
//include vue
//components
Vue.component('admin',require('./pages/admin/dashboard.vue').default);
//initialize vue
const app = new Vue({
    el: '#app',
    router,
    store,
});
