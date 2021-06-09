<template>
  <v-app>
    <v-main style="background-color: #ECEFF1">
      <navbar/>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import navbar from "./components/layout/navbar"
export default {
  name: 'App',
  data: () => ({
    //
  }),
  created() {

  },
  components: {
    navbar: navbar
  }
};
</script>
