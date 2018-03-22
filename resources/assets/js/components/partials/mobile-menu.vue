<template>
  <div class="mobile-menu lg:invisible">
    <collapse-transition>
      <ul class="mUl" v-if="menuIsVisible">
        <li class="mLi">
          <svg-magnify/>
          <input class="ml-1 bg-transparent text-white"
                 type="text"
                 placeholder="Pesquisa..."
                 v-model="searchText">
        </li>

        <li class="mLi">
          <router-link class="nav-link"
                       to="/">
            <svg-home/>
            <span class="ml-1">Página Inicial</span>
          </router-link>
        </li>

        <li class="mLi">
          <router-link to="/forum" class="nav-link lg:inline-flex lg:mt-0">
            <svg-comment/><span class="ml-1">Fórum</span>
          </router-link>
        </li>

        <li class="mLi">

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

    props: {
      user: {
        required: true,
        type: Object
      }
    }
  }
</script>

<style>
  .mUl {
    position: absolute;
    left: 0;
    top: 60px;
    padding: 2rem;
    width: 100%;
  }

  .mLi {

  }
</style>
