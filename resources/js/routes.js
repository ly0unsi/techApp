// End Authentication
let home = require('./components/home.vue').default;
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let logout = require('./components/auth/logout.vue').default;

let createPost = require('./components/post/create.vue').default;
let showPost = require('./components/post/show.vue').default;
let editPost = require('./components/post/edit.vue').default;

let createCat = require('./components/category/create.vue').default;
let catPosts = require('./components/category/index.vue').default;



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
    {
        name: 'createpost',
        path: '/createpost',
        component: createPost
    },
    {
        name: 'createcat',
        path: '/createcat',
        component: createCat
    },
    {
        name: 'post',
        path: '/post/:slug',
        component: showPost
    },
    {
        name: 'catposts',
        path: '/category/:catName',
        component: catPosts
    },
    {
        name: 'editpost',
        path: '/editpost/:postSlug',
        component: editPost
    },

]
