<template>
  <div>
    <main-nav/>

    <fade-transition>
      <keep-alive>
        <router-view/>
      </keep-alive>
    </fade-transition>
  </div>
</template>

<script>
  import { FadeTransition } from 'vue2-transitions'

  export default {
    components: {
      FadeTransition
    },

    name: "app"
  }
</script>
