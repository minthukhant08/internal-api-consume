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

const vuetify = new Vuetify({
  theme: {
    themes: {
      light: {
        primary: "#5E35B1",
        secondary: "#7266ba",
        accent: "#F57C00",
        error: "#f44336",
        warning: "#ffeb3b",
        info: "#2196f3",
        success: "#4caf50"
      },
      dark: {
        primary: "#5E35B1",
        secondary: "#7266ba",
        accent: "#F57C00",
        error: "#f44336",
        warning: "#ffeb3b",
        info: "#2196f3",
        success: "#4caf50"
      },
    }
  },
})

new Vue({
  vuetify : vuetify,
  el: '#app',
  router:router,
});
