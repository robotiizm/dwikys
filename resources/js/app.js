import Vue from "vue";
import router from "./router";
import App from './components/App';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap';
import 'bootstrap/js/dist/util';
import 'bootstrap/js/dist/dropdown';
Vue.use(BootstrapVue)
require('./bootstrap');
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',

    components:  {
        App,
    },

    router,
});
