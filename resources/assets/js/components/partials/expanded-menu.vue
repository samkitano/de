<template>
  <div class="flex flex-row w-full">
    <ul class="left flex flex-row flex-1 list-reset text-xs self-start">
      <li>
        <router-link class="nav-link lg:inline-flex lg:mt-0"
                     to="/">
          <svg-home/>
          <span class="ml-1">Página Inicial</span>
        </router-link>
      </li>

      <li>
        <router-link class="nav-link lg:inline-flex lg:mt-0"
                     to="/forum">
          <svg-comment/>
          <span class="ml-1">Fórum</span>
        </router-link>
      </li>

      <li>
        <router-link class="nav-link lg:inline-flex lg:mt-0"
                     to="/articles">
          <svg-comment/>
          <span class="ml-1">Artigos</span>
        </router-link>
      </li>

      <li class="nav-link search lg:inline-flex lg:mt-0">
        <svg-magnify/>
        <input class="ml-1 bg-transparent text-white"
               type="text"
               placeholder="Pesquisa..."
               v-model="searchText">
      </li>
    </ul>

    <ul class="right flex flex-row flex-1 justify-end list-reset text-xs" v-if="$store.state.user">
      <li>
        <router-link class="nav-link lg:inline-flex lg:mt-0"
                     to="/profile">
          <img :src="$store.state.user.gravatar" class="w-4 h-4 rounded-full">
          <span class="ml-1">{{ $store.state.user.first_name }} {{ $store.state.user.last_name }}</span>
        </router-link>
      </li>

      <li>
        <user-options/>
      </li>


    </ul>
    <ul class="right flex flex-row flex-1 justify-end list-reset text-xs" v-else>
      <li>
        <router-link class="nav-link lg:inline-flex lg:mt-0" to="/entrar">
          <svg-user/>
          <span class="ml-1">Entrar</span>
        </router-link>
      </li>

    </ul>
  </div>



<!--
  <div class="invisible w-full block flex-grow lg:visible lg:flex lg:items-center">
    <div class="navbar-left sm:flex-col lg:flex-grow">
      <router-link class="nav-link lg:inline-flex lg:mt-0"
                   to="/">
        <_svg-home/>
        <span class="ml-1">Página Inicial</span>
      </router-link>

      <router-link to="/forum" class="nav-link lg:inline-flex lg:mt-0">
        <_svg-comment/><span class="ml-1">Fórum</span>
      </router-link>

      <div class="nav-link search lg:inline-flex lg:mt-0">
        <_svg-magnify/>
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
-->
</template>

<script>
  import svgHome from '../svg/_svg-home'
  import userOptions from './user-options'
  import svgComment from '../svg/_svg-comment'
  import svgMagnify from '../svg/_svg-magnify'
  import svgUser from '../svg/_user-circle-o'

  export default {
    components: {
      userOptions,
      svgHome,
      svgComment,
      svgMagnify,
      svgUser
    },

    data () {
      return {
        searchText: ''
      }
    },

    name: 'expandedMenu',
  }


</script>

<style lang="sass">
    .nav-link
        &:not(.search):hover
            background: rgba(0,0,0,0.3)

</style>
