<template>
  <v-app>
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
      color=secondary
    >
      <v-list dense>
        <v-list-item @click="goRoute('/alerts')">
          <v-list-item-action>
            <v-icon>dashboard</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Dashboard</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click="goRoute('/alerts1')">
          <v-list-item-action>
            <v-icon>settings</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Settings</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click="goRoute('/card')">
          <v-list-item-action>
            <v-icon>settings</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Card</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click="goRoute('/usertable')">
          <v-list-item-action>
            <v-icon>person</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>User Table</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click="goRoute('/login')">
          <v-list-item-action>
            <v-icon>person</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Login</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click="goRoute('/Passport')">
          <v-list-item-action>
            <v-icon>person</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Passport</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item>
          <v-list-item-content>
            <v-spacer></v-spacer>
              <v-switch
                label="Dark mode"
                v-model='dark'
                @change="changemode"
              ></v-switch>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      clipped-left
      color=primary
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"><v-icon>menu</v-icon></v-app-bar-nav-icon>
      <div class="text-center pl-2 pr-2" >
        <v-avatar>
          <img src="https://scontent.frgn7-1.fna.fbcdn.net/v/t1.0-9/60349791_420506385196600_4899104598515515392_n.jpg?_nc_cat=107&_nc_oc=AQmdgEOrx_RDElzyjOlTglGOyBl93Hn89e_r0Z1wF0xq2xu_LxqQU_xaGMDTmV1eZqs&_nc_ht=scontent.frgn7-1.fna&oh=600c03d04a3865dbfe3b8903b35b597f&oe=5DD31FAB" alt="avatar">
        </v-avatar>
      </div>
      <v-toolbar-title class="pink--text" style="padding-top:25px;">Talent Program</v-toolbar-title>
    </v-app-bar>

    <v-content>
      <v-fade-transition mode="out-in">
            <router-view></router-view>
      </v-fade-transition>
    </v-content>

    <v-footer app>
      <span>&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
      dark:false
    }),
    methods:{
      goRoute($route){
        this.$router.push($route).catch(err => {});
      },
      changemode(){
        console.log(this.dark);
        this.$vuetify.theme.dark = this.dark;
      }
    },
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>
