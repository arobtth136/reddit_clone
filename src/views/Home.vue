<template>
  <v-container fluid>
    <router-view></router-view>
  </v-container>
</template>

<script>
export default {
  name: 'Home',
  created() {
    this.$router.push('posts')
  }
}
</script>
