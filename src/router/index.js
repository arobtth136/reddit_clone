import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  { path: '/', name: 'Home', component: require('../components/posts/posts').default },
  { path: '/communities', name: 'Communities', component: require('../components/comunidades/communities').default},
  { path: '/community/:name', component: require('../components/comunidades/community').default}
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
