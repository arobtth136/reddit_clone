<template>
  <post/>
</template>

<script>
import post from "./post";
import axios from "axios";

export default {
  name: "posts",
  components: {
    post
  },
  created(){
    axios.get(process.env.VUE_APP_API_URL.concat('/posts/index'))
      .then(result => {
        console.log(result.data)
      })
  }
}
</script>