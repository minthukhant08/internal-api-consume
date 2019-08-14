require('../bootstrap');

import Vue from 'vue';
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import Routes from './routes';
import * as firebase from 'firebase/app';
import 'firebase/auth';
import 'firebase/messaging';
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
        primary: "#ffffff",
        secondary: "#ffffff",
        accent: "#FFB74D",
        error: "#DD2C00",
        warning: "#FFD600",
        info: "#01579B",
        success: "#33691E"
      },
      dark: {
        primary: "#000000",
        secondary: "#111111",
        accent: "#FFB74D",
        error: "#DD2C00",
        warning: "#ffeb3b",
        info: "#2196f3",
        success: "#689F38"
      },
    }
  },
})

var firebaseConfig = {
  apiKey: "AIzaSyCjh3AOk6cnh_NcjGkQ9c7nv3w_3Dqq6cU",
  authDomain: "talent-10911.firebaseapp.com",
  databaseURL: "https://talent-10911.firebaseio.com",
  projectId: "talent-10911",
  storageBucket: "talent-10911.appspot.com",
  messagingSenderId: "613523415046",
  appID: "talent-10911",
};


new Vue({
  vuetify : vuetify,
  el: '#app',
  router:router,
  created:function(){
    firebase.initializeApp(firebaseConfig);
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('../firebase-messaging-sw.js')
      .then(function(registration) {
          firebase.messaging().useServiceWorker(registration);
      }).catch(function(err) {
        console.log('Service worker registration failed, error:', err);
      });
    }
  }
});
