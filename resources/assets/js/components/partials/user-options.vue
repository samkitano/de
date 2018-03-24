<template>
  <div>
    <a href="#" @click.prevent="toggleOptions"><svg-gear/></a>

    <collapse-transition>
      <div v-show="optionsIsVisible" class="absolute bg-white pin-r mr-4">
        <ul class="m-0 p-2">
          <li class="list-reset">
            <a class="flex items-center"
               href="#"
               @click.prevent="logout"
            ><svg-off/> <span class="ml-2">Logout</span></a>
          </li>
        </ul>
      </div>
    </collapse-transition>
  </div>
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
