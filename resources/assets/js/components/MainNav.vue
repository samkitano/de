<template>
  <nav class="main-nav">
    <div class="brand"></div>

    <div class="burger lg:hidden">
      <button class="btn btn-hamburger
"
              @click="toggleMenu">
        <svg-hamburger/>
      </button>
    </div>

    <expanded-menu/>

    <mobile-menu/>
  </nav>
</template>

<script>
  import Bus from '../store/bus.js';
  import svgHamburger from './svg/_svg-hamburger'
  import expandedMenu from './partials/expanded-menu'
  import mobileMenu from './partials/mobile-menu'

  export default {
    components: {
      svgHamburger,
      expandedMenu,
      mobileMenu
    },

    methods: {
      toggleMenu () {
        Bus.$emit('toggleMenu')
      }
    },

    name: 'mainNav',
  }
</script>

<style lang="sass">
  nav
    background: rgba(0, 0, 0, 0) linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1), transparent) repeat scroll 0 0
</style>
