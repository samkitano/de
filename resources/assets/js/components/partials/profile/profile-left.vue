<template>
    <div class="flex flex-col bg-white rounded shadow p-8">
        <div class="flex flex-col pb-8">
            <span class="title-xs">
                Sobre mim
            </span>
            <span class="text-xs py-4 leading-normal">
                {{ $store.state.user.bio }}
            </span>
        </div>

        <div class="flex flex-col pb-8">
            <span class="title-xs">
                Estuda
            </span>
            <span class="text-xs py-4">
                <ul class="">
                    <a href="#"><li class="py-2">Direito Constitucional</li></a>
                    <a href="#"><li class="py-2">Direito das Famílias</li></a>
                    <a href="#"><li class="py-2">Direito Comercial</li></a>
                    <a href="#"><li class="py-2">Direito Administrativo</li></a>
                    <a href="#"><li class="py-2">Direito das Sucessões</li></a>
                </ul>
            </span>
        </div>

        <div class="flex flex-col pb-8">
            <span class="title-xs">
                Amigos
            </span>
            <span class="flex flex-row flex-wrap text-xs py-4 items-start">
                <img src="/img/faces/face1.jpg" class="w-1/4 rounded-full p-1">
                <img src="/img/faces/face2.jpg" class="w-1/4 rounded-full p-1">
                <img src="/img/faces/face3.jpg" class="w-1/4 rounded-full p-1">
                <img src="/img/faces/face4.jpg" class="w-1/4 rounded-full p-1">
                <img src="/img/faces/face5.jpg" class="w-1/4 rounded-full p-1">
                <img src="/img/faces/face6.jpg" class="w-1/4 rounded-full p-1">
                <img src="/img/faces/face7.jpg" class="w-1/4 rounded-full p-1">
                <img src="/img/faces/face8.jpg" class="w-1/4 rounded-full p-1">


            </span>
        </div>

        <div class="flex flex-col">
            <span class="title-xs">
                Medalhas
            </span>
            <span class="text-xs py-4">
                Amigos
            </span>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'profile-left'
  }
</script>

<style lang="sass" scoped>

</style>