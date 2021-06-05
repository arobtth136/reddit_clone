<template>
  <p>{{communities}}</p>
</template>

<script>
import axios from "axios";

export default {
  name: "communities",
  data: () => ({
    communities: []
  }),
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