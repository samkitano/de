<template>
  <section class="user-profile">
    <div class="container mx-auto mt-16 p-4">
      {{ user}}
    </div>
  </section>
</template>

<script>
  const wuser = window.user

  export default {
    beforeMount () {
      this.user = wuser
    },

    data () {
      return {
        user: {}
      }
    },

    name: 'Profile'
  }
</script>
