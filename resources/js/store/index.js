 

import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
Vue.config.debug = true;

import cart from './modules/cart'; 
import loadingoverlay from './modules/loadingoverlay'; 
 
export default new Vuex.Store({
  modules: {
    cart, 
    loadingoverlay, 
  },


//   strict:debug       //Don't care error
});