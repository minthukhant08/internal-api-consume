<template>
  <div>
    <v-card>
      <v-card-title>
        Nutrition
        <v-spacer></v-spacer>
        <v-text-field
          v-model="search"
          append-icon="search"
          label="Search"
          single-line
          hide-detailsprimary
        ></v-text-field>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="users"
        :search="search"
      ></v-data-table>
    </v-card>
    <v-btn block color='green' @click='login'>Login</v-btn>
    <v-btn block color='blue' @click='getall'>Get All</v-btn>
  </div>
</template>

<script>
// import Userview from '../User/UserView.vue';
export default {
  data(){
    return{
        token:'',
        search: '',
        headers: [
          {
            text: 'Image',
            align: 'left',
            sortable: false,
            value: 'name',
          },
          { text: 'Name', value: 'name' },
          { text: 'Email', value: 'email' },
          { text: 'Phone', value: 'phone_no' },
          { text: 'NRC', value: 'nrc_no' },
          { text: 'User Type', value: 'user_type' },
        ],
        users:[]
      }
  },
  methods:{
    login(){
      this.$http.post('http://localhost:8000/api/v1/users/login', {email:'mtk@gmail.com', password: '12345'}).then(response => {
        this.token = response.body.data.token;
      }, response => {
        // error callback
      });
    },
    getall(){
      this.$http.get('http://localhost:8000/api/v1/users', {
        headers: {
            Authorization: 'Bearer '+ this.token
        }
      }).then(response => {
          this.users = response.body.data;
      }, response => {

      });
    }
  },
  computed:{

  }
}
</script>

<style >

</style>















npm install
npm run watch



composer install
php artisan key:generate
php artisan serve
