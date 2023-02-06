import {createRouter, createWebHistory} from "vue-router";
import Home from "../views/HomeView.vue"
import Admin from "../views/AdminView.vue"

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/admin',
        component: Admin
    }
]

const router = createRouter({
    history : createWebHistory(),
    routes
})

export default router;