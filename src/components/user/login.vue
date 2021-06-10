<template>
  <v-card>
    <v-card-title>Iniciar sesión</v-card-title>
    <v-form>
      <v-container>
        <v-row>
          <v-col cols="12">
            <v-text-field v-model="user.username" label="Username" required></v-text-field>
          </v-col>
          <v-col cols="12">
            <v-text-field v-model="user.password" label="Password" type="password" required></v-text-field>
          </v-col>
          <v-col>
            <v-checkbox label="Recordar usuario" v-model="checked"></v-checkbox>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
    <v-card-actions>
      <v-btn plain color="success" class="ma-1" @click="login">
        Login
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
import axios from "axios";

export default {
  name: "login",
  data: () => ({
    valid: false,
    user: {username: '', password: ''},
    checked: false
  }),
  methods: {
    login(){
      const data = new FormData()
      data.append('usuario', this.user.username)
      data.append('password', this.user.password)
      data.append('remember_me', this.checked)
      axios.post(process.env.VUE_APP_API_URL.concat('/user/login'),data,{headers: {'Content-Type': 'text/plain'}})
      .then(response => {
        if(response.data.code === 200){
          this.$store.dispatch('user/set_user',{user: response.data.message})
        }
        console.log(response)
      })
    }
  }
}
</script>