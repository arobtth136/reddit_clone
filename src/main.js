import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
const cors = require('cors')
Vue.config.productionTip = false

new Vue({
  router,
  store,
  vuetify,
  cors,
  render: h => h(App)
}).$mount('#app')
