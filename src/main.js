import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
Vue.config.productionTip = false
Vue.filter("truncate",(text) => {
  return text.length > 300 ? text.substring(0,(300 - 3)) + '...' : text
})
new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount('#app')
