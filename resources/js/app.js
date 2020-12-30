 
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'


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
Vue.use(axios)

// Sweetalert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);
import swal from 'sweetalert2'
window.swal = swal; 



Vue.component('wishlist-shortcut', require('./components/WishlistShortcut.vue').default);
Vue.component('cart-shortcut', require('./components/CartShortcut.vue').default);
Vue.component('cart-system', require('./components/CartSystem.vue').default);

Vue.component('product-single', require('./components/ProductSingle.vue').default);
  
Vue.component('loading-overlay', require('./components/LoadingOverlay.vue').default);



const app = new Vue({
    el: '#app',  
    store, 
});

 

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  
  window.toast = toast;

 