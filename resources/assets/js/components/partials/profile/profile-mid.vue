<template>
    <section class="profile-mid w-full">

        <div class="flex flex-col pb-8">
            <input type="text" placeholder="Escreve no perfil de João Caetano (@ThePaparranas)" class="flex flex-row w-full bg-white rounded-t shadow px-4 py-8 text-xs text-grey-darker">

            <div class="flex flex-row">
                <div class="flex flex-row w-full bg-white rounded-b shadow p-4">
                    <ul class="flex flex-row text-grey-dark w-full text-xs">
                        <li class="flex flex-row items-center bg-grey-lighter text-grey-darkest rounded font-bold">
                            <span class="p-2 text-red">
                                <svg width="1rem"
                                     height="1rem"
                                     viewBox="0 0 1792 1792"
                                     xmlns="http://www.w3.org/2000/svg"
                                     class="flex fill-current">
                                     <path d="M928 832q0-14-9-23t-23-9q-66 0-113 47t-47 113q0 14 9 23t23 9 23-9 9-23q0-40 28-68t68-28q14 0 23-9t9-23zm224 130q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm-1024 574h1536v-128h-1536v128zm1152-574q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5zm-1024-642h384v-128h-384v128zm-128 192h1536v-256h-828l-64 128h-644v128zm1664-256v1280q0 53-37.5 90.5t-90.5 37.5h-1536q-53 0-90.5-37.5t-37.5-90.5v-1280q0-53 37.5-90.5t90.5-37.5h1536q53 0 90.5 37.5t37.5 90.5z"/></svg>
                            </span>
                            <span class="pr-2">
                                Imagem
                            </span>
                        </li>

                        <li class="flex flex-row items-center bg-grey-lighter text-grey-darkest rounded ml-2 font-bold">
                            <span class="p-2 text-red">
                                <svg width="1rem"
                                     height="1rem"
                                     viewBox="0 0 1792 1792"
                                     xmlns="http://www.w3.org/2000/svg"
                                     class="flex fill-current">
                                     <path d="M1703 478q40 57 18 129l-275 906q-19 64-76.5 107.5t-122.5 43.5h-923q-77 0-148.5-53.5t-99.5-131.5q-24-67-2-127 0-4 3-27t4-37q1-8-3-21.5t-3-19.5q2-11 8-21t16.5-23.5 16.5-23.5q23-38 45-91.5t30-91.5q3-10 .5-30t-.5-28q3-11 17-28t17-23q21-36 42-92t25-90q1-9-2.5-32t.5-28q4-13 22-30.5t22-22.5q19-26 42.5-84.5t27.5-96.5q1-8-3-25.5t-2-26.5q2-8 9-18t18-23 17-21q8-12 16.5-30.5t15-35 16-36 19.5-32 26.5-23.5 36-11.5 47.5 5.5l-1 3q38-9 51-9h761q74 0 114 56t18 130l-274 906q-36 119-71.5 153.5t-128.5 34.5h-869q-27 0-38 15-11 16-1 43 24 70 144 70h923q29 0 56-15.5t35-41.5l300-987q7-22 5-57 38 15 59 43zm-1064 2q-4 13 2 22.5t20 9.5h608q13 0 25.5-9.5t16.5-22.5l21-64q4-13-2-22.5t-20-9.5h-608q-13 0-25.5 9.5t-16.5 22.5zm-83 256q-4 13 2 22.5t20 9.5h608q13 0 25.5-9.5t16.5-22.5l21-64q4-13-2-22.5t-20-9.5h-608q-13 0-25.5 9.5t-16.5 22.5z"/></svg>
                            </span>
                            <span class="pr-2">
                                A Estudar
                            </span>
                        </li>

                        <li class="flex flex-row items-center bg-red text-white rounded text-white ml-auto font-bold">
                            <span class="p-2">
                                <svg width="1rem"
                                     height="1rem"
                                     viewBox="0 0 1792 1792"
                                     xmlns="http://www.w3.org/2000/svg"
                                     class="flex fill-current">
                                     <path d="M1764 11q33 24 27 64l-256 1536q-5 29-32 45-14 8-31 8-11 0-24-5l-453-185-242 295q-18 23-49 23-13 0-22-4-19-7-30.5-23.5t-11.5-36.5v-349l864-1059-1069 925-395-162q-37-14-40-55-2-40 32-59l1664-960q15-9 32-9 20 0 36 11z"/>
                                </svg>
                            </span>
                            <span class="pr-2">
                                Enviar
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex flex-row pb-8">
            <div class="flex flex-row w-full bg-white rounded shadow p-4">
                <img :src="$store.state.user.gravatar" class="max-w-full max-h-full w-8 h-8 rounded-full">

                <p class="text-grey-darker pl-2 text-xs leading-normal align-middle self-center">
                    <span class="nickname font-bold align-middle">
                        <router-link class="lg:mt-0" to="/profile">
                            {{ $store.state.user.first_name }} {{ $store.state.user.last_name }}
                        </router-link>
                    </span>

                    <span class="align-middle text-grey-dark">
                        (@{{ $store.state.user.nick_name }})
                    </span>

                    <span class="text-grey-dark">
                        está a estudar
                    </span>

                    <span class="text-grey-dark">
                        <a href="#">Direito Administrativo</a>.
                    </span>
                </p>
            </div>
        </div>

        <div class="flex pb-8">
            <div class="flex flex-col bg-white rounded w-full shadow">
                <div class="flex flex-row p-4">
                    <img :src="$store.state.user.gravatar" class="max-w-full max-h-full w-8 h-8 rounded-full">

                    <p class="text-grey-darker pl-2 text-xs leading-normal align-middle self-center text-grey-dark">
                            <router-link class="lg:mt-0" to="/profile">
                                {{ $store.state.user.first_name }} {{ $store.state.user.last_name }}
                            </router-link>
                            (@{{ $store.state.user.nick_name }})

                            escreveu no perfil de

                            <router-link class="lg:mt-0" to="/profile">
                                {{ $store.state.user.first_name }} {{ $store.state.user.last_name }}
                            </router-link>
                            (@{{ $store.state.user.nick_name }}).

                    </p>
                </div>

                <div>
                    <p class="px-4 py-1">I know you!</p>
                </div>

                <div class="flex items-start">
                    <img src="/img/spiderman.jpg">
                </div>

                <div class="flex flex-col w-full">
                    <ul class="flex flex-row p-4 text-sm">
                        <li>
                            <router-link to="/profile" class="">
                                <svg width=".875rem"
                                     viewBox="0 0 1792 1792"
                                     class="fill-current align-middle"
                                     xmlns="http://www.w3.org/2000/svg"><path d="M896 1664q-26 0-44-18l-624-602q-10-8-27.5-26t-55.5-65.5-68-97.5-53.5-121-23.5-138q0-220 127-344t351-124q62 0 126.5 21.5t120 58 95.5 68.5 76 68q36-36 76-68t95.5-68.5 120-58 126.5-21.5q224 0 351 124t127 344q0 221-229 450l-623 600q-18 18-44 18z"/></svg>
                                <span class="align-middle">
                                    Gosto
                                </span>
                            </router-link>
                        </li>

                        <li class="px-2"></li>

                        <li>
                            <router-link to="/profile" class="text-grey-dark hover:text-grey-darker">
                                <svg width=".875rem"
                                     viewBox="0 0 1792 1792"
                                     class="fill-current align-middle"
                                     xmlns="http://www.w3.org/2000/svg"><path d="M1792 896q0 174-120 321.5t-326 233-450 85.5q-70 0-145-8-198 175-460 242-49 14-114 22-17 2-30.5-9t-17.5-29v-1q-3-4-.5-12t2-10 4.5-9.5l6-9 7-8.5 8-9q7-8 31-34.5t34.5-38 31-39.5 32.5-51 27-59 26-76q-157-89-247.5-220t-90.5-281q0-130 71-248.5t191-204.5 286-136.5 348-50.5q244 0 450 85.5t326 233 120 321.5z"/></svg>
                                <span class="align-middle">
                                    Comentar
                                </span>
                            </router-link>
                        </li>

                        <li class="px-2"></li>

                        <li>
                            <span class="align-middle">
                                <router-link to="/profile" class="text-grey-dark hover:text-grey-darker">
                                <svg width=".875rem"
                                     viewBox="0 0 1792 1792"
                                     class="fill-current align-middle"
                                     xmlns="http://www.w3.org/2000/svg"><path d="M1792 640q0 26-19 45l-512 512q-19 19-45 19t-45-19-19-45v-256h-224q-98 0-175.5 6t-154 21.5-133 42.5-105.5 69.5-80 101-48.5 138.5-17.5 181q0 55 5 123 0 6 2.5 23.5t2.5 26.5q0 15-8.5 25t-23.5 10q-16 0-28-17-7-9-13-22t-13.5-30-10.5-24q-127-285-127-451 0-199 53-333 162-403 875-403h224v-256q0-26 19-45t45-19 45 19l512 512q19 19 19 45z"/></svg>
                                    Partilhar
                                </router-link>
                            </span>
                        </li>

                        <li class="ml-auto">
                            <span>
                                3 Comentários
                            </span>
                        </li>
                    </ul>
                    <ul class="flex flex-row p-4 text-sm">
                        <li class="text-xs">
                        <span>
                            <router-link to="/profile">
                                Tu
                            </router-link>,
                            <router-link to="/profile">
                                Arnold Schwarzeneger
                            </router-link> e outras
                            <router-link to="/profile">
                                57 pessoas
                            </router-link> gostam disto!
                        </span>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col p-4">
                    <div class="flex flex-row text-xs pb-2">
                        <router-link class="lg:mt-0" to="/profile">
                            {{ $store.state.user.first_name }} {{ $store.state.user.last_name }}
                        </router-link>

                        <span class="ml-1">
                            It's a me, spuderman!
                        </span>
                    </div>

                    <div class="flex flex-row text-xs pb-2">
                        <router-link class="lg:mt-0" to="/profile">
                            Henrique Albuquerque
                        </router-link>

                        <span class="ml-1">
                            Wow, ofensivo!
                        </span>
                    </div>

                    <div class="flex flex-row text-xs pb-2">
                        <router-link class="lg:mt-0" to="/profile">
                            Fausto Manciel
                        </router-link>

                        <span class="ml-1">
                            Baza <router-link class="lg:mt-0 font-light" to="/profile">
                            @Henrique Albuquerque
                        </router-link>!
                        </span>
                    </div>

                    <div class="flex flex-row flex-no-shrink text-xs pb-2">
                        <router-link class="lg:mt-0 flex-no-shrink self-start" to="/profile">
                            Roberto Telescópio
                        </router-link>

                        <span class="ml-1">
                            Comentário longo para ver como fica. Será que sai para fora da div? Será que o texto formata e vai para baixo da imagem de perfil, ou será que fica alinhado com o primeiro parágrafo? Sei lá.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
  export default {
    name: 'profile-mid'
  }
</script>

<style lang="sass" scoped>

</style>