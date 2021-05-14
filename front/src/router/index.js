import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Materia from '../views/Materia.vue'
import Leccion from '../views/Leccion.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/materia',
    name: 'materia',
    component: Materia
  },
  {
    path: '/materia/leccion',
    name: 'leccion',
    component: Leccion
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
