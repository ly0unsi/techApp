/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'
import logout from './components/auth/logout'
import axios from 'axios'
Vue.use(VueRouter)
import User from './Helpers/User';
window.User = User

import VueTinySlider from 'vue-tiny-slider';
Vue.component('tiny-slider', VueTinySlider)
// Sweet Alert start
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.Toast = Toast;

// Sweet Alert End

// Router Imported
import { routes } from './routes';

const router = new VueRouter({
    routes,
    mode: 'history'
})
window.Reload = new Vue();

const app = new Vue({
    el: '#app',
    router,

});
