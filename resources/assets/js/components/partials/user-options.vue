<template>
  <li>
    <router-link to="#" class="nav-link lg:inline-flex lg:mt-0" @click.prevent="toggleOptions">
        <svg-gear/>
    </router-link>

    <collapse-transition>
          <li  v-show="optionsIsVisible" class="list-reset">
            <router-link class=""
               to="#"
               @click.prevent="logout"
            ><svg-off/> <span class="ml-2">Logout</span>
            </router-link>
          </li>
    </collapse-transition>
  </li>
</template>

<script>
  import axios from 'axios'
  import svgOff from '../svg/_svg-off'
  import svgGear from '../svg/_svg-gear'
  import { CollapseTransition } from 'vue2-transitions'

  export default {
    components: {
      svgGear,
      svgOff,
      CollapseTransition
    },

    data () {
      return {
        optionsIsVisible: false
      }
    },

    methods: {
      logout () {
        axios
          .post('/logout')
          .then(() => {
            this.$swal('Até à próxima!', 'A tua sessão foi terminada.', 'success')
              .then(() => {
                window.location = '/'
              })
          })
      },

      toggleOptions () {
        this.optionsIsVisible = !this.optionsIsVisible
      }
    },

    name: 'userOptions'
  }
</script>
