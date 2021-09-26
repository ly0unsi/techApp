

// End Authentication
let home = require('./components/home.vue').default;
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let logout = require('./components/auth/logout.vue').default;


export const routes = [
    { path: '/', component: home, name: 'home' },
    {
        name: 'register',
        path: '/register',
        component: register
    },
    {
        name: 'logout',
        path: '/logout',
        component: logout
    },
    {
        name: 'login',
        path: '/login',
        component: login
    },

]
