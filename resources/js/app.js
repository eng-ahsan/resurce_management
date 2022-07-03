

require('./bootstrap');

import Vue from 'vue'; // if this is not work add this =>  window.Vue = require('vue');

import axios from 'axios';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router'; //import vuer-router for routing
import VModal from 'vue-js-modal'; //import modal for po up
import VueClipboard from 'vue-clipboard2' //impor veu-key board
import Vue2editor from 'vue2-editor'; // editor import


Vue.use(VueClipboard);
Vue.use(Vue2editor);
Vue.use(VModal);
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

import App from './app.vue';
import { routes } from './routes';


const router = new VueRouter({
    mode: 'history',
    routes: routes,
    
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});