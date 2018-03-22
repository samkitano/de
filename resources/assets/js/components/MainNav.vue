<template>
  <nav class="main-nav">
    <div class="brand"></div>

    <div class="burger lg:hidden">
      <button class="btn btn-hamburger"
              @click="openMenu">
        <svg-hamburger/>
      </button>
    </div>

    <div :class="menuVisibility">
      <div class="nav-left sm:flex-col lg:flex-grow">
        <router-link class="nav-link lg:inline-flex lg:mt-0"
                     to="/">
          <svg-home/>
          <span class="ml-1">Página Inicial</span>
        </router-link>

        <router-link to="/forum" class="nav-link lg:inline-flex lg:mt-0">
          <svg-comment/><span class="ml-1">Fórum</span>
        </router-link>

        <div class="nav-link lg:inline-flex lg:mt-0">
          <svg-magnify/>
          <input class="ml-1 bg-transparent text-white"
                 type="text"
                 placeholder="Pesquisa..."
                 v-model="searchText">
        </div>
      </div>

      <div class="nav-right" v-if="user">
        <a href="#"
           class="user-name lg:mt-0"
        >{{ fullName }}</a>
      </div>

      <div class="nav-right" v-else>
        <router-link class="router-link lg:mt-0" to="/entrar">
          Entrar
        </router-link>
      </div>
    </div>
  </nav>
</template>

<script>
  import svgHome from './svg/_svg-home'
  import svgComment from './svg/_svg-comment'
  import svgMagnify from './svg/_svg-magnify'
  import svgHamburger from './svg/_svg-hamburger'

  const wuser = window.user

  export default {
    components: {
      svgHamburger,
      svgHome,
      svgComment,
      svgMagnify
    },

    data () {
      return {
        menuIsVisible: false,
        searchText: '',
        user: JSON.parse(wuser)
      }
    },

    computed: {
      menuVisibility () {
        let common = 'w-full block flex-grow lg:visible lg:flex lg:items-center lg:w-auto'

        return this.menuIsVisible
          ? common
          : `${common} hidden`
      },
      fullName () {
        return `${this.user.first_name} ${this.user.last_name}`
      }
    },

    methods: {
      openMenu () {
        this.menuIsVisible = !this.menuIsVisible
      }
    },

    name: 'mainNav',
  }
</script>

<style lang="sass">
  nav
    background: rgba(0, 0, 0, 0) linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1), transparent) repeat scroll 0 0
</style>
