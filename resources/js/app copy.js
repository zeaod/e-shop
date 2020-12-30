 
require('./bootstrap');

window.Vue = require('vue');


// vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import store from "./store/index"


// axios
window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
let token = document.head.querySelector('meta[name="csrf-token"]')
if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}
import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)


// Sweetalert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);
import swal from 'sweetalert2'
window.swal = swal;



Vue.use(VueGoodTablePlugin);

import VueGoodTablePlugin from 'vue-good-table';


import Vue from 'vue'
import VueMeta from 'vue-meta'
import Element from 'element-ui'
import Vuetify from 'vuetify';
import * as VueGoogleMaps from 'vue2-google-maps';

import Overdrive from 'vue-overdrive'
Vue.use(Overdrive)

import VueAnimate from 'vue-animate-scroll'

Vue.use(VueAnimate)

Vue.use(VueGoogleMaps, {
  load: {
    key: ''
  }
})

Vue.use(Vuetify);

import _ from 'lodash'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Element)

Vue.component('invoice-status-code-component', require('./components/InvoiceStatusCode.vue').default);
Vue.component('autocomplete', require('./components/Autocomplete').default);

const app = new Vue({
    el: '#app',
    store,
    vuetify: new Vuetify(),
});

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

