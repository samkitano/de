<template>
    <div class="header w-full">
        <div class="overlay h-80 absolute pin-y pin-x bg-black opacity-50 w-full"/>

        <div class="header-text h-80 relative flex flex-col items-center justify-center w-full text-white">
            <h1 class="title text-5xl mt-8 py-2 px-8" style="text-transform:uppercase">
                {{ $route.meta.name }}
            </h1>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'HeroMini'
  }
</script>

<style lang="sass">
    .header
        background: url('/img/main_4.jpg') no-repeat bottom
        background-size: cover

    .title
        background: rgba(255,255,255,0.82);
        color: #000
        mix-blend-mode: screen
</style>
