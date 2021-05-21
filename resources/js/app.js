
require('./bootstrap');
//vue
window.Vue = require('vue').default;

//vform
import Form from 'vform'
window.Form=Form

//vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//routes
import {routes} from './routes/routes'

const router =new VueRouter({
    routes,
    mode: 'history',
})


//Vue.component('home', require('./components/backend/home/HomeComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});
