import Vue from 'vue';
import hooks from "./pages/hooks";
import VueRouter from 'vue-router';
//pages
import blogPage from './pages/blog.vue';
import methods from "./pages/methods";
import loopcondition from "./pages/loopcondition";

// larvel vue blog app admin pages
import tagsPage from "./pages/admin/tagsPage.vue";

Vue.use(VueRouter);

export default new VueRouter({
    base: 'laravel-vue-blog/public/',
    mode: 'history',
    routes:[
      /////////////////////laravel vue blog //////////// admin routes/////////////
        {
            path: '/tags',
            name:'tags',
            component: tagsPage
        },
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
