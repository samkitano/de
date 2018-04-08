<template>
    <div class="topic flex flex-col mt-4 bg-white shadow rounded">
        <div class="topic-top-top flex flex-col mt-4">
            <span class="flex-no-grow flex flex-row self-start bg-white p-2 border-red border-l-4 -ml-1 font-bold text-red text-xs shadow">
                DIREITO PENAL
            </span>

            <span class="flex p-4">
                <h4 class=" align-baseline">TITULO SOBRE O TÓPICO QUE TEM DE SER GRANDE O SUFICIENTE PARA OCUPAR 2 LINHAS</h4>
            </span>
        </div>
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


            <div class="flex w-1/5 justify-end">
                <svg width="1rem"
                     height="1rem"
                     class="fill-current"
                     viewBox="0 0 1792 1792"
                     xmlns="http://www.w3.org/2000/svg"><path d="M1088 1248v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68z"/></svg>
            </div>
        </div>

        <div class="topic-mid flex flex-col px-4 items-stretch w-full">
            <span class="self-stretch w-full">
                <p>Como é que posso ganhar 1050€ sem fazer nada?</p>
                <p> Alguém me diz?</p>
                <p>Plzzzzzzzzz!!!</p>
            </span>
        </div>

        <div class="bottom flex flex-row">
            <ul class="flex flex-row items-stretch pt-4 pb-2 px-4 list-reset w-full content-center justify-center">
                <li class="rounded px-4 py-2 w-1/3 text-center hover:bg-grey-lighter">Gosto</li>
                <li class="rounded px-4 py-2 w-1/3 text-center hover:bg-grey-lighter">Comentar</li>
                <li class="rounded px-4 py-2 w-1/3 text-center hover:bg-grey-lighter">Partilhar</li>
            </ul>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Topic'
  }
</script>

<style lang="sass">
    p
        line-height: 1rem
    .topic
        border: 1px solid rgba(0,0,0,0.03)
</style>