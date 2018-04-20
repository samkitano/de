<template>
    <div class="body-topic flex flex-col bg-white shadow rounded">
        <div class="body-topic-top-top flex flex-row mt-4 w-full">
            <div class="flex flex-row self-start items-center bg-white text-red p-2 border-red border-l-4 -ml-1 shadow">
                <a href="#" class="">
                    <span class="flex-grow font-bold self-stretch px-2 text-xs">
                        DIREITO PENAL:
                    </span>
                </a>
                <a href="#" class="text-grey-darkest hover:text-grey-darkest">
                    <span class="flex-grow font-bold px-2">
                        Como é que posso ganhar 1050€ sem fazer nada?
                    </span>
                </a>

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
            </div>

            <div class="topic-mid flex flex-col px-14 items-stretch w-full">

                <div class="flex flex-col mt-2 border-grey-light">
                    <p>A minha questão é:</p>
                    <p>Como é que posso ganhar 1000€, quiçá 30.000.000€, sem fazer nada?</p>
                    <p>Dá para fazer isso a jogar computador?</p>
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
                        Comentar
                    </li>
                </router-link>
                <li class="rounded px-4 py-2 w-1/3 text-center hover:bg-grey-lighter">
                    Partilhar
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'body-topic'
  }
</script>

<style lang="sass" scoped>
    p
        line-height: 1.5rem
</style>