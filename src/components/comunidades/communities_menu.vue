<template>
  <v-list>
    <v-subheader>Comunidades</v-subheader>
    <v-list-item-group>
      <v-list-item v-for="community in communities" :key="community.id">
        <v-list-item-avatar>
          <v-img :src="community.icono"></v-img>
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title v-text="community.nombre"></v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list-item-group>
    <v-subheader><a @click="go_to_link('/communities')">Descubrir más</a></v-subheader>
  </v-list>
</template>

<script>
import axios from "axios";

export default {
  name: "communities_menu",
  data: () => ({
    communities: []
  }),
  methods: {
    go_to_link(link){
      this.$router.push({path: link})
    }
  },
  created() {
    axios.get(process.env.VUE_APP_API_URL.concat('/community/index'))
    .then(response => {
      this.communities = response.data.slice(0,5)
    })
  }
}
</script>

<style scoped>

</style>