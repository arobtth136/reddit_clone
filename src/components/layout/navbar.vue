<template>
  <v-app-bar app color="white" dark>
    <div class="d-flex align-center">
      <v-img alt="Reddit clone logo" class="shrink mr-2" contain src="images/Reddit-logo.png" transition="scale-transition" width="100"/>
      <v-menu :close-on-content-click="false">
        <template v-slot:activator="{ on, attrs }">
          <v-btn text color="black" class="ma-2" v-bind="attrs" v-on="on">
            <span class="mr-2"><v-icon>mdi-home</v-icon> Principal</span>
          </v-btn>
        </template>
        <communities_menu/>
      </v-menu>
    </div>
    <v-spacer></v-spacer>
    <div v-if="!get_user">
      <v-menu :close-on-content-click="false">
        <template v-slot:activator="{ on, attrs }">
          <v-btn text color="black" class="ma-1" v-bind="attrs" v-on="on">
            <span class="mr-2">Login <v-icon>mdi-account</v-icon></span>
          </v-btn>
        </template>
        <login/>
      </v-menu>
      <v-btn text color="black">
        <span class="mr-2">Register <v-icon>mdi-account-plus</v-icon></span>
      </v-btn>
    </div>
    <div v-else>
      <v-menu :close-on-content-click="false">
        <template v-slot:activator="{ on, attrs }">
          <v-btn text large color="black" class="ma-1" v-bind="attrs" v-on="on">
            <span class="mr-2">{{get_user.nombreUsuario}}</span>
          </v-btn>
        </template>
      </v-menu>
    </div>
  </v-app-bar>
</template>

<script>
import {mapGetters} from "vuex/dist/vuex.mjs"
import login from "../user/login"
import communities_menu from "../comunidades/communities_menu"
export default {
  name: "navbar",
  computed: {
    ...mapGetters('user', ['get_user'])
  },
  components: {
    login: login,
    communities_menu: communities_menu
  }
}
</script>

<style scoped>

</style>