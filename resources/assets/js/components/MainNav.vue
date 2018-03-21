<template>
  <nav class="fixed pin-y pin-x flex items-center justify-between flex-wrap p-6 h-16 z-10">
    <div class="flex items-center flex-no-shrink text-white mr-6">
    </div>
    
    <div class="block lg:hidden absolute pin-r mr-4">
        <button class="btn btn-hamburger"
                @click="openMenu">
            <svg-hamburger/>
        </button>
    </div>

    <div :class="menuVisibility">
        <div class="sm:flex-col text-sm lg:flex-grow">
            <router-link class="nav-link lg:inline-flex lg:mt-0"
                         to="/">
                <svg class="fill-current"
                     width="1rem"
                     viewBox="0 0 1792 1792"
                     xmlns="http://www.w3.org/2000/svg"
                ><path d="M1472 992v480q0 26-19 45t-45 19h-384v-384h-256v384h-384q-26 0-45-19t-19-45v-480q0-1 .5-3t.5-3l575-474 575 474q1 2 1 6zm223-69l-62 74q-8 9-21 11h-3q-13 0-21-7l-692-577-692 577q-12 8-24 7-13-2-21-11l-62-74q-8-10-7-23.5t11-21.5l719-599q32-26 76-26t76 26l244 204v-195q0-14 9-23t23-9h192q14 0 23 9t9 23v408l219 182q10 8 11 21.5t-7 23.5z"/></svg
                ><span class="ml-1">Página Inicial</span></router-link
            >

            <a href="#" class="nav-link lg:inline-flex lg:mt-0">
                <svg class="fill-current"
                     width="1rem"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20"
                ><path d="M10 15l-4 4v-4H2a2 2 0 0 1-2-2V3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-8zM5 7v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2z"/></svg
                ><span class="ml-1">Fórum</span></a
            >

            <div class="nav-link lg:inline-flex lg:mt-0">
                <svg class="fill-current"
                     width="1rem"
                     viewBox="0 0 1792 1792"
                     xmlns="http://www.w3.org/2000/svg"
                ><path d="M1216 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"/></svg
                ><input class="ml-1 bg-transparent text-white"
                        type="text"
                        placeholder="Pesquisa..."
                        v-model="searchText">
            </div>
        </div>

        <div v-if="user.name">
            <a href="#"
               class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0"
            >{{ fullName }}</a>
        </div>

        <div v-else>
            <router-link class="nuxt-link lg:mt-0"
                         to="/Entrar">Entrar</router-link>
        </div>

    </div>
  </nav>
</template>

<script>
    import svgHamburger from './svg/_svg-hamburger'

    export default {
      components: {
        svgHamburger
      },
      data () {
          return {
              menuIsVisible: false,
              searchText: '',
              user: {
                //   name: 'João',
                //   surname: 'Caetano',
              }
          }
      },
      computed: {
          menuVisibility () {
              let common = 'lg:visible w-full block flex-grow lg:flex lg:items-center lg:w-auto'

              return this.menuIsVisible
              ? common
              : `${common} hidden`
         },
         fullName () {
             return `${this.user.name} ${this.user.surname}`
         }
      },
      name: 'mainNavigation',
      methods: {
          openMenu () {
              this.menuIsVisible = !this.menuIsVisible
          }
      }
    }
</script>

<style lang="sass">
nav 
    background: rgba(0, 0, 0, 0) linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1), transparent) repeat scroll 0% 0%
</style>
