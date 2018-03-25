<template>
  <div class="invisible w-full block flex-grow lg:visible lg:flex lg:items-center">
    <div class="navbar-left sm:flex-col lg:flex-grow">
      <router-link class="nav-link lg:inline-flex lg:mt-0"
                   to="/">
        <svg-home/>
        <span class="ml-1">Página Inicial</span>
      </router-link>

      <router-link to="/forum" class="nav-link lg:inline-flex lg:mt-0">
        <svg-comment/><span class="ml-1">Fórum</span>
      </router-link>

      <div class="nav-link search lg:inline-flex lg:mt-0">
        <svg-magnify/>
        <input class="ml-1 bg-transparent text-white"
               type="text"
               placeholder="Pesquisa..."
               v-model="searchText">
      </div>
    </div>

    <div class="navbar-right" v-if="$store.state.user">
      <div class="mr-2">
        <router-link class="lg:mt-0" to="/profile">{{ $store.state.user.name }}</router-link>
      </div>

      <user-options/>
    </div>

    <div class="navbar-right" v-else>
      <router-link class="router-link lg:mt-0" to="/entrar">
        Entrar
      </router-link>
    </div>
  </div>
</template>

<script>
  import svgHome from '../svg/_svg-home'
  import userOptions from './user-options'
  import svgComment from '../svg/_svg-comment'
  import svgMagnify from '../svg/_svg-magnify'

  export default {
    components: {
      userOptions,
      svgHome,
      svgComment,
      svgMagnify
    },

    data () {
      return {
        searchText: ''
      }
    },

    name: 'expandedMenu',
  }
</script>
