<template>
  <div class="auth">
    <div class="auth--overlay"/>

    <div class="auth--container" v-if="!user">
      <div class="form--container lg:w-2/5 md:w-3/5 md:mx-0">
        <ul class="tabs">
          <li class="li">
            <a @click="showLoginTab = true" :class="loginTabClass" href="#">LOGIN</a>
          </li>

          <li class="li">
            <a @click="showLoginTab = false" :class="registerTabClass" href="#">REGISTAR</a>
          </li>
        </ul>

        <login v-if="showLoginTab"/>

        <register v-else/>
      </div>
    </div>

    <div class="auth--container" v-else>
      <div class="form--container lg:w-2/5 md:w-3/5 md:mx-0">
        <div class="tabs">
          <div class="w-full text-center bg-grey-light">
            <a @click.prevent="noop" class="tab active" href="#">UHHH?</a>
          </div>
        </div>

        <div class="text-center p-4">
          <h2 class="text-2xl">Dude, já estás autenticad@!</h2>
          <div class="go-home-you-are-drunk mt-4">
            <router-link to="/"><svg-home width="4rem"/></router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import login from './partials/login'
  import svgHome from './svg/_svg-home'
  import register from './partials/register'

  const wuser = window.user

  export default {
    beforeMount () {
      this.user = wuser
    },

    components: {
      login,
      register,
      svgHome
    },

    data () {
      return {
        showLoginTab: true,
        forgot: false,
        user: false
      }
    },

    computed: {
      loginTabClass () {
        return this.showLoginTab
          ? 'tab active'
          : 'tab'
      },
      registerTabClass () {
        return this.showLoginTab
          ? 'tab'
          : 'tab active'
      },
    }
  }
</script>

<style lang="sass">
  .auth
    background: url('/img/main10.jpg') no-repeat center center
    background-size: cover
</style>
