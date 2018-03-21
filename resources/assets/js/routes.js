/* global kcms */
'use strict'

import VueRouter from 'vue-router'
import Home from './components/Home.vue'

let routes = [
  {
    path: '/',
    component: Home
  }
]

export default new VueRouter({
  abstract: true,
  mode: 'history',
  routes
})
