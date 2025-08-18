import { createRouter, createWebHashHistory } from 'vue-router';
import MainRoutes from './MainRoutes';

export const router = createRouter({
    history: createWebHashHistory('/admin'),
    routes: [
        {
            path: '/:pathMatch(.*)*',
            component: () => import('@/views/pages/Error404.vue')
        },
        MainRoutes,
    ]
});

