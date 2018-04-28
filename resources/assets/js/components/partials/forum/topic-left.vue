<template>
    <section class="w-full">
        <div class="flex flex-col rounded shadow bg-white p-4">
            <h2>Ramos do Direito > Direito Penal</h2>
            <span class="text-xs text-grey-dark pt-2 pb-8">
                Postado à 3 dias e 14 horas
            </span>

            <div class="flex flex-row">
                <div class="flex flex-col w-1/4 items-center">
                    <img :src="$store.state.user.gravatar" class="w-2/5 rounded-full">
                    <span class="font-bold mt-2">
                        {{ $store.state.user.first_name }} {{ $store.state.user.last_name }}
                    </span>
                    <span class="text-grey-dark text-xs mt-1">
                        @{{ $store.state.user.nick_name }}
                    </span>
                    <button class="bg-red hover:bg-red-dark text-white mt-2 py-2 px-4 rounded text-xs">
                        Adicionar Amigo
                    </button>
                </div>

                <div class="flex flex-col pl-4 w-3/4">
                    <h3>
                        Uma pessoa que tem cancelamento de notas na polícia civil pode ter seus dados acessados pela polícia civil de outro estado?
                    </h3>

                    <p class="py-2">
                        Uma pessoa que possue cancelamento de notas junto a policia civil e ocorrencias pode ter os dados acessados na policia civil de outro estado ou é só mediante soli itacao? Ou é so as ocorrencias?
                    </p>

                    <p class="py-2">
                        Uma pessoa que possue cancelamento de notas junto a policia civil e ocorrencias pode ter os dados acessados na policia civil de outro estado ou é só mediante soli itacao? Ou é so as ocorrencias?
                    </p>

                    <p class="py-2">
                        Uma pessoa que possue cancelamento de notas junto a policia civil e ocorrencias pode ter os dados acessados na policia civil de outro estado ou é só mediante soli itacao? Ou é so as ocorrencias?
                    </p>
                    <ul class="flex flex-row pt-4 w-full">
                        <li class="flex flex-row text-grey-dark">
                            <a href="" class="flex flex-row">
                                <svg-thumbs-up class="fill-current self-center"/>
                            </a>
                            <span class="text-sm self-center px-2 text-red font-bold">+17</span>
                            <a href="" class="flex flex-row text-grey-dark">
                                <svg-thumbs-down class="thumbs-down fill-current self-center"/>
                            </a>
                        </li>
                        <li class="text-sm self-end ml-auto">
                            <a href="#" class="text-grey-darker">
                                2 Comentários
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--Comentários-->

            <div class="flex flex-col w-3/4 align-end ml-auto p-4">
                <div class="flex flex-row mt-8">
                    <img src="/img/faces/face1.jpg" class="w-10 h-10 rounded-full">
                    <div class="flex flex-col justify-center">
                        <div class="flex flex-row items-center">
                            <span class="px-2">
                                <a href="#" class="text-xs">
                                    Steve McDouche
                                </a>
                            </span>
                        </div>

                        <span class="text-xs text-grey-dark px-2">
                            Postado há 23 minutos
                        </span>
                    </div>
                </div>

                <div class="flex ml-12 py-2">
                    Sei lá, aprende a escrever!
                </div>

                <ul class="flex flex-row w-full">
                    <li class="flex flex-row text-grey-dark pr-4 ml-12">
                        <a href="" class="flex flex-row">
                            <svg-thumbs-up class="fill-current self-center"/>
                        </a>
                        <span class="text-sm self-center px-2 text-red font-bold">+86</span>
                        <a href="" class="flex flex-row text-grey-dark">
                            <svg-thumbs-down class="thumbs-down fill-current self-center"/>
                        </a>
                    </li>
                    <li class="text-sm">
                        <a href="#" class="text-grey-darker">
                            Responder
                        </a>
                    </li>
                </ul>

                <div class="flex flex-row mt-8">
                    <img :src="$store.state.user.gravatar" class="w-10 h-10 rounded-full">
                    <div class="flex flex-col justify-center">
                        <div class="flex flex-row items-center">
                            <span class="px-2">
                                <a href="#" class="text-xs">
                                    {{ $store.state.user.first_name }} {{ $store.state.user.last_name }}
                                </a>
                            </span>
                        </div>

                        <span class="text-xs text-grey-dark px-2">
                            Postado há 23 minutos
                        </span>
                    </div>
                </div>

                <div class="flex ml-12 py-2">
                    Olha aí
                </div>

                <ul class="flex flex-row w-full">
                    <li class="flex flex-row text-grey-dark pr-4 ml-12">
                        <a href="" class="flex flex-row">
                            <svg-thumbs-up class="fill-current self-center"/>
                        </a>
                        <span class="text-sm self-center px-2 text-red font-bold">+1</span>
                        <a href="" class="flex flex-row text-grey-dark">
                            <svg-thumbs-down class="thumbs-down fill-current self-center"/>
                        </a>
                    </li>
                    <li class="text-sm">
                        <a href="#" class="text-grey-darker">
                            Responder
                        </a>
                    </li>
                </ul>

            </div>



        </div>
    </section>
</template>

<script>
  import svgCoffee from '../../svg/_svg-coffee'
  import svgExclamation from '../../svg/_svg-exclamation'
  import svgBook from '../../svg/_svg-book'
  import svgThumbsUp from '../../svg/_svg-thumbs-up'
  import svgThumbsDown from '../../svg/_svg-thumbs-down'

  export default {
    components: {
      svgCoffee,
      svgExclamation,
      svgBook,
      svgThumbsUp,
      svgThumbsDown
    },
    name: 'topic-left'
  }
</script>

<style lang="sass" scoped>
    .thumbs-down
        -moz-transform: scaleX(-1)
        -webkit-transform: scaleX(-1)
        -o-transform: scaleX(-1)
        transform: scaleX(-1)
</style>