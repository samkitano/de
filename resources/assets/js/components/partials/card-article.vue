<template>
    <div class="topic flex flex-row mt-4 shadow">
        <div class="flex topic-left w-1/6 p-4 bg-grey-lightest flex flex-col items-stretch justify-between content-between text-center">
            <svg width="2rem"
                 height="2rem"
                 viewBox="0 0 1792 1792"
                 class="fill-current self-center"
                 xmlns="http://www.w3.org/2000/svg"><path d="M1408 1216q0 26-19 45t-45 19h-896q-26 0-45-19t-19-45 19-45l448-448q19-19 45-19t45 19l448 448q19 19 19 45z"/></svg>

            <span class="font-bold text-xs">4867 Pontos</span>

            <svg width="2rem"
                 height="2rem"
                 viewBox="0 0 1792 1792"
                 class="fill-current self-center"
                 xmlns="http://www.w3.org/2000/svg"><path d="M1408 704q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45 45-19h896q26 0 45 19t19 45z"/></svg>
        </div>
        <div class="flex flex-col topic-right bg-white p-4">
            <span class="text-xs">
                <a href="#">Direito Penal</a>
            </span>

            <span class="py-1">
                <a href="#" class="topic-link text-grey-darkest font-thin">LP If you like one song by an artist, but don't dig the rest of their stuff. find out who the producer is and see what other work they've done. The producer can play a big role in how the final song turns out.</a>
            </span>

            <span class="text-xs text-grey-dark py-1">
                Enviado há 3 horas por <router-link to="/profile">{{ $store.state.user.name }}</router-link>
            </span>

            <div class="text-xs flex flex-row text-grey-dark font-bold">
                <span>316 Comentários</span>
                <span class="ml-2">Partilhar</span>
                <span class="ml-2">Guardar</span>
                <span class="ml-2">Denunciar</span>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'CardArticle'
  }
</script>

<style lang="sass">

</style>