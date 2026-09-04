import { createRouter, createWebHistory } from "vue-router";
import Home from "../Pages/Home.vue"
import Products from "../Pages/Products.vue"

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home, 
    },
    {
        path: '/products',
        name: 'products',
        component: Products, 
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router; 