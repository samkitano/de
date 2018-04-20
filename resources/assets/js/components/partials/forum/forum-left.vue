<template>
    <div class="flex flex-col w-full">
        <card-topic/>
        <card-topic/>
        <card-topic/>
        <card-topic/>
    </div>
</template>

<script>
  import CardTopic from './card-topic.vue';

  export default {
    components: {
      CardTopic
    },
    name: 'forum-left'
  }
</script>

<style scoped>

</style>