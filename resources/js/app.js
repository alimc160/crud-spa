require('./bootstrap');
import Vue from "vue";
import store from './store';

Window.Vue = require('vue');

Vue.component('users-listing',require('./components/Users').default);
Vue.component('add-user',require('./components/AddUser').default);

const app = new Vue({
    el: '#app',
    store
});
