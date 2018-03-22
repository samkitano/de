<template>
    <div class="header w-full">
        <div class="overlay h-screen absolute pin-y pin-x bg-black opacity-50 w-full"/>

        <div class="header-text h-screen relative flex flex-col items-center justify-center w-full text-white">
            <h1 class="title text-5xl mb-4">
                LOREM IPSUM
            </h1>

            <div class="description p-4 mb-4 sm:w-full md:w-3/4 lg:w-3/5 text-center">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis cum, deleniti esse est eveniet itaque mollitia, nihil nisi sint totam vel velit voluptatem voluptates. Aspernatur eaque id repellendus vel voluptas.
            </div>

            <div class="mt-4">
                <a class="btn btn-outline p-4 mt-2 text-white" href="#">CRIA UMA QUESTÃO</a>
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
        background: url('/img/main10.jpg') no-repeat center center
        background-size: cover
</style>
