/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import App from "./components/App";

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import Task from "./components/Task";

Vue.use(VueRouter);

Vue.component('App', require('./components/App.vue').default);

const routes = [
    { path: '/home', component: App },
    { path: '/tasks', component: Task }
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    el: '#app',
    router: router
});
