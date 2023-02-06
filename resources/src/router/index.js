import {createRouter, createWebHistory} from "vue-router";
import Home from "../views/HomeView.vue";
import Admin from "../views/AdminView.vue";
import Historial from "../views/HistorialView.vue";
import Movimiento from "../views/MovimientoView.vue";

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/admin',
        component: Admin
    },
    {
        path: '/historial',
        component: Historial
    },
    {
        path: '/historial/:id',
        component: Historial
    },
    {
        path: '/movimiento',
        component: Movimiento
    },
]

const router = createRouter({
    history : createWebHistory(),
    routes
})

export default router;