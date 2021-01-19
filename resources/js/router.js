import Vue from 'vue';
import VueRouter from 'vue-router';
import blogPage from './pages/blog.vue';

Vue.use(VueRouter);

export default new VueRouter({
    base: 'laravel-vue-blog/public/',
    mode: 'history',
    routes:[{
        path: '/blog',
        name:'blog',
        component: blogPage
    }]
});
