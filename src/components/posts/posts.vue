<template>
  <v-row>
    <v-col cols="12" v-for="post in posts" :key="post.id" class="d-flex flex-column justify-center align-center">
      <v-lazy :options="{ threshold: .5 }">
        <v-card max-width="500px" min-width="500px">
          <v-card-title>{{post.titulo}}</v-card-title>
          <v-card-subtitle>{{post.usuario}} / {{post.comunidad}}</v-card-subtitle>
          <v-card-text>{{post.texto | truncate}}</v-card-text>
          <v-card-actions>
            <v-btn class="ma-2" text icon :color="post.like == 1 ? 'green' : 'gray'"><v-icon>mdi-thumb-up</v-icon></v-btn>
            <v-btn class="ma-2" text icon :color="post.like == 0 ? 'red' : 'gray'"><v-icon>mdi-thumb-down</v-icon></v-btn>
          </v-card-actions>
        </v-card>
      </v-lazy>
    </v-col>
  </v-row>
</template>

<script>

export default {
  name: "posts",
  data: () => ({
    posts: []
  }),
  created(){
    fetch(process.env.VUE_APP_API_URL.concat('/post/index'))
      .then(result => result.json())
      .then(result => {
        this.posts = result
        //colores green lighten-2 red lighten-2
      })
  },
}
</script>