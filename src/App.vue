<template>
  <v-app>
    <navbar/>
    <v-main style="background-color: #ECEFF1">
      <router-view/>
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
  components: {
    navbar: navbar
  }
};
</script>
