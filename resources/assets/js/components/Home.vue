<template>
  <main class="content">
    <hero/>
  </main>
</template>

<script>
  import hero from './partials/hero'

  const user = window.user

  export default {
    components: {
      hero
    },

    data () {
      return {
        user
      }
    },
    name: "home",
  }
</script>
