/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
Vue.component('layout', require('./components/layout.vue').default);
Vue.use(VueRouter)

// register jw pagination component globally
import JwPagination from 'jw-vue-pagination';
Vue.component('jw-pagination', JwPagination);

import VueHead from 'vue-head'
Vue.use(VueHead)

import VueProgressBar from 'vue-progressbar'
const options = {
    color: '#dc3545',
    failedColor: '#874b4b',
    thickness: '2px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}
Vue.use(VueProgressBar, options)


import User from './Helpers/User';
window.User = User

import VueTinySlider from 'vue-tiny-slider';
Vue.component('tiny-slider', VueTinySlider)

import { VueEditor } from "vue2-editor";
Vue.component('VueEditor', VueEditor)

// Import Notification Class
import Notification from './Helpers/Notification';
window.Notification = Notification

window.moment = require('moment');

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


var VueSlugify = require('vue-slugify')
Vue.use(VueSlugify)

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
