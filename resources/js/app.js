require('./bootstrap');
//vue
window.Vue = require('vue').default;

//vform
import Form from 'vform'
window.Form=Form


//sweet alert2
import Swal from 'sweetalert2'
window.Swal=Swal

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast=Toast

//toastr

import toastr from 'toastr'
window.toastr=toastr


//vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//routes
import {routes} from './routes/routes'

const router =new VueRouter({
    routes,
    //mode: 'history',
})


//vuex
import Vuex from 'vuex'
Vue.use(Vuex)

import storeData from "./store/store";

const store = new Vuex.Store(
    storeData
)

//moment
import {filter} from './filter/filter'

//ichecker-bootstrap
import icheck from 'icheck-bootstrap'
Vue.use(icheck)


//ckeditor-5
import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use( CKEditor );


//Vue.component('home', require('./components/backend/home/HomeComponent.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});
