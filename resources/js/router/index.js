import { createRouter, createWebHistory } from 'vue-router'

import Dashboard from '../components/Dashboard.vue'

const routes = [
    {
        path: '/dashboard',
        name: 'dashboard.index',
        component: Dashboard
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
