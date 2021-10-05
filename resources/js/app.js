require('./bootstrap');
import Vue from "vue";
import store from './store';

Window.Vue = require('vue');

Vue.component('users-listing',require('./components/Users').default);

const app = new Vue({
    el: '#app',
    store
});
