<template>
    <div class="body-topic flex flex-col bg-white shadow rounded">
        <div id="welcomeDiv">
            <div class="topic-top flex flex-row p-4 w-full">
                <div class="flex flex-row w-4/5">
                    <img :src="$store.state.user.gravatar" class="max-w-full max-h-full w-8 h-8 rounded-full">

                    <div class="flex flex-col">
                <span class="font-bold block px-2 align-middle">
                    {{ $store.state.user.first_name }} {{ $store.state.user.last_name }}
                </span>
                        <span class="text-xs block px-2 align-middle text-grey-dark">
                    @{{ $store.state.user.nick_name }}
                </span>
                    </div>
                </div>

                <div class="flex px-4 flex-1 justify-end self-center">
                <span>
                    <svg width="1rem"
                         height="1rem"
                         class="fill-current align-middle"
                         viewBox="0 0 1792 1792"
                         xmlns="http://www.w3.org/2000/svg"><path d="M1088 1248v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68z"/></svg>

                </span>
                </div>
            </div>

            <div class="topic-mid flex flex-col px-14 items-stretch w-full">

                <div class="flex flex-col mt-2 border-grey-light">
                    <p>Vai trabalhar</p>
                </div>
            </div>
        </div>

        <div class="bottom flex flex-row">
            <ul class="flex flex-row items-stretch pt-4 pb-2 px-4 list-reset w-full content-center justify-center">
                <li class="rounded px-4 py-2 w-1/3 text-center hover:bg-grey-lighter">
                    Gosto
                </li>
                <router-link class="card-topic-links font-thin rounded px-4 py-2 w-1/3 text-center text-grey-darker hover:text-grey-darker hover:bg-grey-lighter" to="/topic">
                    <li class="">
                        Responder
                    </li>
                </router-link>
            </ul>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'comment-body'
  }
</script>

<style lang="sass" scoped>

</style>