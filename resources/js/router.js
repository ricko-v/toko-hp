import Home from './pages/Home.vue';
import notFound from './pages/404.vue';
import Login from './pages/Login.vue';
import Admin from './pages/admin/Admin.vue';
import ProdukBaru from './pages/admin/produk_baru';
import ProdukSecond from './pages/admin/produk_second';
import ProdukDiskon from './pages/admin/produk_diskon';
import ProdukBrand from './pages/admin/produk_brand';

export const routes = [
    {
        component: Home,
        path: '/',
        name: 'home'
    },
    {
        component: Admin,
        path: '/admin',
        name: 'admin'
    },
    {
        component: Login,
        path: '/admin/login',
        name: 'login'
    },
    {
        component: ProdukBaru,
        path: '/admin/produk_baru',
        name: 'produk_baru'
    },
    {
        component: ProdukSecond,
        path: '/admin/produk_second',
        name: 'produk_second'
    },
    {
        component: ProdukDiskon,
        path: '/admin/produk_diskon',
        name: 'produk_diskon'
    },
    {
        component: ProdukBrand,
        path: '/admin/produk_brand',
        name: 'produk_brand'
    },
    {
        component: notFound,
        path: '*',
        name: '404'
    },
]