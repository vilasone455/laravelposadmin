import DashBoard from '../view/dashboard.vue'
import Product from '../view/product.vue'

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'home',
            component: DashBoard,
        },
        {
            path: '/product',
            name: 'product',
            component: Product,
        }
    ]
}