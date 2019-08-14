<template>
  <v-layout pt-4 row wrap>
      <v-flex pt-4 pb-4 lg-3 v-for="a in 10" key='a'>
        <v-card
          class="mx-auto"
          max-width="400"
          color=secondary  
        >
          <v-img
            class="white--text"
            height="200px"
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
          >
            <v-card-title class="align-end fill-height">Top 10 Australian beaches</v-card-title>
          </v-img>

          <v-card-text>
            <span>completed: {{data.completed}}</span><br>
            <span>ID: {{data.id}}</span><br>
            <span class="text--primary">
              <span>Title: {{data.title}}</span><br>
              <span>UserID: {{data.userId}}</span>
            </span>
          </v-card-text>

          <v-card-actions>
            <v-btn
              text
              color=accent
              @click='showalert'
            >
              Share
            </v-btn>
            <v-btn
              text
              color=accent
              @click='changeText'
            >
              Explore
            </v-btn>
            <v-btn
              text
              color=accent
              @click='callapi'
            >
              call API
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
  </v-layout>
</template>

<script>
// import Userview from '../User/UserView.vue';
export default {
  data(){
    return{
      data:{},
    }
  },
  methods:{
    changeText() {
      this.name = "something";
    },
    showalert(){
      alert('sdfdsfasdf');
    },
    callapi(){
      this.$http.get('https://jsonplaceholder.typicode.com/todos/1').then(response => {
        this.data = response.body;
      }, response => {
        // error callback
      });
    }
  },
  computed:{

  }
}
</script>

<style >

</style>
