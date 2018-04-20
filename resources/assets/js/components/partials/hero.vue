<template>
    <div class="header w-full">
        <div class="overlay h-screen absolute pin-y pin-x bg-black opacity-50 w-full"/>

        <div class="header-text h-screen relative flex flex-col items-center justify-center w-full text-white">
            <h1 class="title text-5xl mb-4 py-2 px-8">
                DireitoEscolar
            </h1>

            <div class="description p-4 mb-4 sm:w-full md:w-3/4 lg:w-3/5 text-center">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum, deleniti esse est eveniet itaque mollitia, nihil nisi sint totam vel velit voluptatem voluptates. Aspernatur eaque id repellendus vel voluptas.
            </div>

            <div>
                <button class="btn btn-transparent lg:mt-0" href="#">CRIA UMA QUESTÃO</button>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Hero'
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
