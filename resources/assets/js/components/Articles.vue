<template>
    <section class="articles flex flex-col">
        <hero-mini/>

        <div class="box flex relative self-center bg-grey-lighter w-5/6 -mt-16 rounded">
            <div class="left flex flex-row w-full p-8">
                <div class="flex w-2/3 flex-col">
                    <div class="forum-left p-4">
                        <div class="forum-tabs block flex bg-white shadow">
                            <ul class="flex flex-row items-stretch justify-start content-center items-center list-reset text-xs w-full shadow-1">
                                <a href="#" class="px-3 py-3 hvr-sweep-to-bottom self-center"><li>TUDO</li></a>
                                <a href="#" class="px-3 py-3 hvr-sweep-to-bottom self-center"><li>DIREITO CIVIL</li></a>
                                <a href="#" class="px-3 py-3 hvr-sweep-to-bottom self-center active"><li>DIREITO PENAL</li></a>
                                <a href="#" class="px-3 py-3 hvr-sweep-to-bottom self-center"><li>DIREITO DAS FAMÍLIAS</li></a>
                                <a href="#" class="px-3 py-3 hvr-sweep-to-bottom self-center"><li>DIREITOS REAIS</li></a>
                            </ul>

                            <a href="#" class="flex self-end items-center px-3 justify-center content-center self-center">
                                <svg width="1rem"
                                     height="1rem"
                                     viewBox="0 0 1792 1792"
                                     class="justify-center content-center self-center"
                                     xmlns="http://www.w3.org/2000/svg"><path d="M109 1651q-19 19-32 13t-13-32v-1472q0-26 13-32t32 13l710 710q9 9 13 19v-710q0-26 13-32t32 13l710 710q19 19 19 45t-19 45l-710 710q-19 19-32 13t-13-32v-710q-4 10-13 19z"/></svg>
                            </a>
                        </div>

                        <div class="topics-list flex flex-col">
                            <topics/>
                            <topics/>
                            <topics/>
<topic/>
                        </div>
                    </div>
                </div>


                <div class="forum-right  w-1/3 p-4">
                    <div class="block shadow flex flex-row items-stretch content-around justify-around w-full bg-white py-3 text-xs items-center px-4">

                        <div class="flex flex-row items-center">
                       <span class="text-yellow-dark self-center">
                        <svg width="1rem"
                             height="1rem"
                             class="fill-current"
                             viewBox="0 0 1792 1792"
                             xmlns="http://www.w3.org/2000/svg"><path d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z"/></svg>
                       </span>
                            <span class="self-center"> 467</span>
                        </div>

                        <div>
                            <svg width="1rem"
                                 height="1rem"
                                 class="fill-current"
                                 viewBox="0 0 1792 1792"><path d="M1664 1504v-768q-32 36-69 66-268 206-426 338-51 43-83 67t-86.5 48.5-102.5 24.5h-2q-48 0-102.5-24.5t-86.5-48.5-83-67q-158-132-426-338-37-30-69-66v768q0 13 9.5 22.5t22.5 9.5h1472q13 0 22.5-9.5t9.5-22.5zm0-1051v-24.5l-.5-13-3-12.5-5.5-9-9-7.5-14-2.5h-1472q-13 0-22.5 9.5t-9.5 22.5q0 168 147 284 193 152 401 317 6 5 35 29.5t46 37.5 44.5 31.5 50.5 27.5 43 9h2q20 0 43-9t50.5-27.5 44.5-31.5 46-37.5 35-29.5q208-165 401-317 54-43 100.5-115.5t46.5-131.5zm128-37v1088q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-1088q0-66 47-113t113-47h1472q66 0 113 47t47 113z"/></svg>

                        </div>


                        <div>
                            <svg width="1rem"
                                 height="1rem"
                                 class="fill-current"
                                 viewBox="0 0 1792 1792"
                                 xmlns="http://www.w3.org/2000/svg"><path d="M1528 1280h-248v248q29-10 41-22l185-185q12-12 22-41zm-280-128h288v-896h-1280v1280h896v-288q0-40 28-68t68-28zm416-928v1024q0 40-20 88t-48 76l-184 184q-28 28-76 48t-88 20h-1024q-40 0-68-28t-28-68v-1344q0-40 28-68t68-28h1344q40 0 68 28t28 68z"/></svg>

                        </div>

                        <div>
                            <svg width="1rem"
                                 height="1rem"
                                 class="fill-current"
                                 viewBox="0 0 1792 1792"
                                 xmlns="http://www.w3.org/2000/svg"><path d="M1152 896q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm512-109v222q0 12-8 23t-20 13l-185 28q-19 54-39 91 35 50 107 138 10 12 10 25t-9 23q-27 37-99 108t-94 71q-12 0-26-9l-138-108q-44 23-91 38-16 136-29 186-7 28-36 28h-222q-14 0-24.5-8.5t-11.5-21.5l-28-184q-49-16-90-37l-141 107q-10 9-25 9-14 0-25-11-126-114-165-168-7-10-7-23 0-12 8-23 15-21 51-66.5t54-70.5q-27-50-41-99l-183-27q-13-2-21-12.5t-8-23.5v-222q0-12 8-23t19-13l186-28q14-46 39-92-40-57-107-138-10-12-10-24 0-10 9-23 26-36 98.5-107.5t94.5-71.5q13 0 26 10l138 107q44-23 91-38 16-136 29-186 7-28 36-28h222q14 0 24.5 8.5t11.5 21.5l28 184q49 16 90 37l142-107q9-9 24-9 13 0 25 10 129 119 165 170 7 8 7 22 0 12-8 23-15 21-51 66.5t-54 70.5q26 50 41 98l183 28q13 2 21 12.5t8 23.5z"/></svg>

                        </div>

                    </div>

                    <div class="forum-right flex flex-col bg-grey-lightest shadow">
                        <forum-right/>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
  import HeroMini from './partials/hero-mini.vue';
  import Topic from './partials/topic.vue';
  import Topics from './partials/topics.vue';
  import ForumRight from './partials/forum-right.vue';

  export default {
    components: {
      HeroMini,
      Topic,
      Topics,
      ForumRight,
    },
    name: 'Articles'
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