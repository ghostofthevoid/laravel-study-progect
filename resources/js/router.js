import { createApp } from 'vue';
import * as VueRouter from "vue-router";


const app = createApp({});

const routes = [
    {
        path: '/api/categories', component: () => import('./components/Category/Index.vue'),
        name: 'category.index'
    },
    {
        path: '/api/categories/creat', component: () => import('./components/Category/Creat.vue'),
        name: 'category.creat'
    }
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes
})

export default router;

