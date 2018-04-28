<template>
  <div class="mobile-menu lg:invisible">
    <collapse-transition>
      <ul class="flex flex-row mUl bg-white list-reset text-grey-dark shadow-lg"
          v-if="menuIsVisible">
        <li class="m-search mLi text-grey-dark">
          <!-- <_svg-magnify/> -->
          <input class="bg-transparent w-full py-3 px-4 bg-grey-lighter text-grey-darker"
                 type="text"
                 placeholder="Pesquisa..."
                 v-model="searchText">
        </li>

        <li class="mLi mt-2 py-3">
          <router-link class="nav-link-sm"
                       to="/">
            <svg-home/>
            <span class="ml-1">Início</span>
          </router-link>
        </li>

        <li class="mLi mt-2 py-3">
          <router-link to="/forum" class="nav-link-sm lg:inline-flex lg:mt-0">
            <svg-comment/>
            <span class="ml-1">Fórum</span>
          </router-link>
        </li>

        <li class="mLi mt-2  py-3">
          <router-link to="/forum" class="nav-link-sm lg:inline-flex lg:mt-0">
            <svg-comment/>
            <span class="ml-1">Artigos</span>
          </router-link>
        </li>

        <li class="mLi mt-2  py-3">
          <router-link class="lg:mt-0 w-full" to="/profile">{{ $store.state.user.name }}</router-link>
        </li>
      </ul>
    </collapse-transition>
  </div>
</template>

<script>
  import Bus from '../../store/bus.js';
  import svgHome from '../svg/_svg-home'
  import userOptions from './user-options'
  import svgComment from '../svg/_svg-comment'
  import svgMagnify from '../svg/_svg-magnify'
  import { CollapseTransition } from 'vue2-transitions'

  export default {
    beforeDestroy () {
      Bus.$off('toggleMenu', this.toggleMenu)
    },

    components: {
      CollapseTransition,
      svgHome,
      userOptions,
      svgComment,
      svgMagnify
    },

    created () {
      Bus.$on('toggleMenu', this.toggleMenu)
    },

    data () {
      return {
        menuIsVisible: false,
        searchText: ''
      }
    },

    methods: {
      toggleMenu () {
        this.menuIsVisible = !this.menuIsVisible
      }
    },

    name: 'mobileMenu',
  }
</script>

<style lang="sass" scoped>
  .mUl
    position: absolute
    display: flex
    flex-direction: row
    flex-wrap: wrap
    left: 0
    top: 4rem
    padding: 2rem
    width: 100%
    justify-content: space-between

    .mLi
      text-align: center
      border-radius: 2px
      background: #f1f5f8 //grey-lighter
      flex-basis: 29%
      justify-content: space-between
      &:hover
        background: #ad343e //red
      &:hover > .nav-link-sm
        color: #fff
    .nav-link-sm
      color: #8795a1 //grey-dark
      &:hover
        color: #fff //grey-dark

    .m-search
      flex-basis: 100%
</style>
