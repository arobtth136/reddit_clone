<template>
  <post/>
</template>

<script>
import post from "./post";
export default {
  name: "posts",
  components: {
    post
  },
  created(){
    console.log(process.env.APP_URL)
    fetch(process.env.APP_URL.concat('/post/index'))
      .then(result => result.json())
      .then(result => {
        console.log(result)
      })
  }
}
</script>