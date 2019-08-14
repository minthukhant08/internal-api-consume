<template>
  <v-form
    ref="form"
    v-model="valid"
    lazy-validation
  >
    <v-btn
      color="secondary"
      @click="fb"
    >
      Facebook Login
    </v-btn>

    <v-btn
      color="primary"
      @click="gg"
    >
      Google Login
    </v-btn>

    <v-btn
      color="primary"
      @click="getNoti"
    >
      GetToken
    </v-btn>

  </v-form>
</template>

<script>
import firebase from 'firebase';
// import { askForPermissioToReceiveNotifications } from '../push-notification';
export default {
  methods:{
    fb(){
      console.log('logged');
      var provider = new firebase.auth.FacebookAuthProvider();
      firebase.auth().signInWithPopup(provider).then(function(result) {
        // This gives you a Facebook Access Token. You can use it to access the Facebook API.
        var token = result.credential.accessToken;
        // The signed-in user info.
        var user = result.user;
        console.log(token);
      }).catch(function(error) {
        // Handle Errors here.
        console.log(error);
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        // ...
      });
  },
  gg(){
    var provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Google Access Token. You can use it to access the Google API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      console.log(result.user.displayName + ' ' + result.user.email);
      // ...
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });
  },
  async getNoti(){
    try {
      const messaging = firebase.messaging();
      await messaging.requestPermission();
      const token = await messaging.getToken();
      console.log('I got the token :', token);
      // this.profile.noti_token=token;
      // return token;
    } catch (error) {
      console.error(error);
    }
 },
}
}
</script>

<style lang="css" scoped>

</style>
