<template>
    <div class="topic flex flex-row mt-4 bg-white shadow">
        <div class="flex top h-8 p-8 w-full">
            <div class="flex">
                <img :src="$store.state.user.gravatar" class="forum-avatar -ml-4 rounded-full h-8 self-center">
                <span class="font-bold self-center px-2">
                {{ $store.state.user.first_name }} {{ $store.state.user.last_name }}
            </span>
            </div>

            <div class="absolute flex flex justify-end content-end w-1/6 right">
                <a class="flex flex self-end">
                    <svg width="1rem"
                         height="1rem"
                         viewBox="0 0 1792 1792"
                         class="fill-current"
                         xmlns="http://www.w3.org/2000/svg"><path d="M1088 1248v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68z"/></svg>
                </a>
            </div>

        </div>
    </div>
</template>

<script>
  export default {
    name: 'Topic'
  }
</script>

<style lang="sass">

</style>