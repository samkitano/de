<template>
    <section class="forum-holder w-full">
        <hero-mini/>
        <div class="flex flex-col">
            <div class="flex flex-row w-full p-8">
                <div class="flex w-2/3 px-4">
                    <category-left/>
                </div>

                <div class="flex w-1/3 px-4">
                    <forum-right/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
  import HeroMini from './partials/hero-mini.vue';
  import CategoryLeft from './partials/forum/category-left.vue';
  import ForumRight from './partials/forum/forum-right.vue';

  export default {
    components: {
      HeroMini,
      CategoryLeft,
      ForumRight,
    },
    name: 'Categoria'
  }
</script>


<style lang="css">

    a.hvr-sweep-to-bottom {
        color: #606f7b;
    }
    a.active {
        background: #ad343e;
        color: #fff;
    }

    /* Sweep To Bottom */
    .hvr-sweep-to-bottom {
        -webkit-transform: perspective(0) translateZ(0);
        transform: perspective(0) translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        -webkit-transition-property: color;
        transition-property: color;
        -webkit-transition-duration: 0.15s;
        transition-duration: 0.15s;
    }
    .hvr-sweep-to-bottom:before {
        content: "";
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #ad343e;
        -webkit-transform: scaleY(0);
        transform: scaleY(0);
        -webkit-transform-origin: 50% 0;
        transform-origin: 50% 0;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-duration: 0.15s;
        transition-duration: 0.15s;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .hvr-sweep-to-bottom:hover, .hvr-sweep-to-bottom:focus, .hvr-sweep-to-bottom:active {
        color: white;
    }
    .hvr-sweep-to-bottom:hover:before, .hvr-sweep-to-bottom:focus:before, .hvr-sweep-to-bottom:active:before {
        -webkit-transform: scaleY(1);
        transform: scaleY(1);
    }

</style>