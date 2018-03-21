<template>
  <main class="content">
    <p>{{ user.name }}</p>
  </main>
</template>

<script>
  const user = window.user

  export default {
    data () {
      return {
        user
      }
    },
    name: "home",
  }
</script>
