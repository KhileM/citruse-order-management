import {createWebHistory, createRouter} from 'vue-router';
import ProductsList from './components/ProductsList.vue';
import AddProduct from './components/AddProduct.vue';
import CreateSupplier from './components/CreateSupplier.vue';

export const routes = [
    {
        path: '/',
        name: 'CreateSupplier',
        component: CreateSupplier
    }
    ,
    {
        name: 'ProductsList',
        path: '/',
        component: ProductsList
    },
    {
        name: 'AddProduct',
        path: '/add-product',
        component: AddProduct
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router;
