<template>
  <div>
    <main-nav/>

    <keep-alive>
      <router-view/>
    </keep-alive>
  </div>
</template>

<script>
  export default {
    name: "app"
  }
</script>
