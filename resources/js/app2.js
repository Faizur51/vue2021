require('./bootstrap');
//vue
window.Vue = require('vue').default;


//vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//routes
import {routes} from './routes/routes2'

const router =new VueRouter({
    routes,
    //mode: 'history',
    scrollBehavior(){
        return{
            x:0,
            y:0
        }
    }
})


//vuex
import Vuex from 'vuex'
Vue.use(Vuex)

import storeData from "./store/store2";

const store = new Vuex.Store(
    storeData
)

//moment
import {filter} from './filter/filter'

//vue-pagination
Vue.component('pagination', require('laravel-vue-pagination'));

//component
Vue.component('myheader', require('./components/frontend/MyHeader.vue').default);
Vue.component('myfooter', require('./components/frontend/MyFooter.vue').default);
Vue.component('sidebar',require('./components/frontend/SideBar').default);

const app = new Vue({
    el: '#app',
    router,
    store
});
