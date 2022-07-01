require('./bootstrap');

import Vue from 'Vue';
import VueRouter from 'vue-router'

import App from './App.vue';
import router from './Router/index';
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);
Vue.use(VueRouter)

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
