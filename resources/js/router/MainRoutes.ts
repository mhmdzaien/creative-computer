const MainRoutes = {
    path: '/main',
    redirect: '/main',
    component: () => import('@/layouts/full/FullLayout.vue'),
    children: [
        {
            name: 'Dashboard',
            path: '/',
            component: () => import('@/views/dashboard/index.vue')
        },
        {
            name: 'Produk',
            path: '/produk',
            component: () => import('@/views/produk/Produk.vue')
        },
        {
            name: 'Pengguna',
            path: '/pengguna',
            component: () => import('@/views/pengguna/Pengguna.vue')
        },
        {
            name: 'Servis',
            path: '/servis',
            component: () => import('@/views/servis/Servis.vue')
        },
        {
            name: 'Servis Progress',
            path: '/servis/progress/:id',
            component: () => import('@/views/servis/Progress.vue')
        },
    ]
};

export default MainRoutes;
