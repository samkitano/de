'use strict'

import VueRouter from 'vue-router'
import Forum from './components/Forum'
import Entrar from './components/Entrar'
import Home from './components/Home.vue'
import RecoverPw from './components/RecoverPw'
import Profile from './components/Profile.vue'
import Articles from './components/Articles.vue'
import Article from './components/Article.vue'
import Topic from './components/Topic.vue'

let routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: { name: 'Inicio' }
  },
  {
    path: '/entrar',
    name: 'entrar',
    component: Entrar,
    meta: { name: 'Entrar' }
  },
  {
    path: '/forum',
    name: 'forum',
    component: Forum,
    meta: { name: 'Forum' }
  },
  {
    path: '/topic',
    name: 'topic',
    component: Topic,
    meta: { name: 'Tópico' }
  },
  {
    path: '/recover/:token/:email',
    name: 'recover',
    component: RecoverPw,
    meta: { name: 'Recuperar Password'}
  },
  {
    path:'/profile',
    name: 'profile',
    component: Profile,
    meta: { name: 'Perfil' }
  },
  {
    path: '/articles',
    name: 'articles',
    component: Articles,
    meta: { name: 'Artigos'}
  },
  {
    path: '/article',
    name: 'article',
    component: Article,
    meta: { name: 'Artigo'}
  },
]

export default new VueRouter({
  abstract: true,
  mode: 'history',
  routes
})
