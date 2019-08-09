require('./bootstrap');

import Vue from 'vue';
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import Routes from './routes';
Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(VueResource);
Vue.component('app-view', require('./App.vue').default);
const router= new VueRouter({
  routes:Routes,
  mode:'history'
});

new Vue({
  vuetify : new Vuetify(),
  el: '#app',
  router:router,
});
