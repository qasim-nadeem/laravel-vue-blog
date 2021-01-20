import Vue from 'vue';
import VueRouter from 'vue-router';
//pages
import blogPage from './pages/blog.vue';
import hooks from "./pages/hooks";
import methods from "./pages/methods";
import loopcondition from "./pages/loopcondition";

Vue.use(VueRouter);

export default new VueRouter({
    base: 'laravel-vue-blog/public/',
    mode: 'history',
    routes:[
        {
            path: '/blog',
            name:'blog',
            component: blogPage
        },
        {
            path: '/hooks',
            name:'hooks',
            component: hooks
        },
        {
            path: '/methods',
            name:'methods',
            component: methods
        },
        {
            path: '/loopcondition',
            name:'loopcondition',
            component: loopcondition
        },
    ]
});
