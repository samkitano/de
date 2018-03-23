<template>
  <div class="auth">
    <div class="auth--overlay"/>

    <div class="auth--container">
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
  </div>
</template>

<script>
  import login from './partials/login'
  import register from './partials/register'

  export default {
    components: {
      login,
      register
    },

    data () {
      return {
        showLoginTab: true,
        forgot: false
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
