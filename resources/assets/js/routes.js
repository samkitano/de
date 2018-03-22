'use strict'

import VueRouter from 'vue-router'
import Forum from './components/Forum'
import Entrar from './components/Entrar'
import Home from './components/Home.vue'

let routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/entrar',
    name: 'entrar',
    component: Entrar
  },
  {
    path: '/forum',
    name: 'forum',
    component: Forum
  }
]

export default new VueRouter({
  abstract: true,
  mode: 'history',
  routes
})
