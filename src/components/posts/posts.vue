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
    console.log('hola desde posts')
    /*axios.get()
      .then(result => {
        console.log(result.data)
      })*/
  }
}
</script>