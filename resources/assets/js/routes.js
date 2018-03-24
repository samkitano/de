'use strict'

import VueRouter from 'vue-router'
import Forum from './components/Forum'
import Entrar from './components/Entrar'
import Home from './components/Home.vue'
import RecoverPw from './components/RecoverPw'
import Profile from  './components/Profile.vue'

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
  },
  {
    path: '/recover/:token/:email',
    name: 'recover',
    component: RecoverPw
  },
  {
    path:'/profile',
    name: 'profile',
    component: Profile
  }
]

export default new VueRouter({
  abstract: true,
  mode: 'history',
  routes
})
