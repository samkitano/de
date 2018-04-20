<template>
    <section class="profile-mid w-full">
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
                    <a href="#">Direito Administrativo</a>
                </span>
                </p>
            </div>
        </div>

        <div class="flex pb-8">
            <div class="flex flex-col bg-white rounded w-full shadow">
                <div class="flex flex-row p-4">
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
                        <span class="align-middle px-4">
                        <svg width="1rem"
                             height="1rem"
                             viewBox="0 0 1792 1792"
                             class="text-grey-darker align-middle"
                             xmlns="http://www.w3.org/2000/svg"><path d="M1152 896q0 26-19 45l-448 448q-19 19-45 19t-45-19-19-45v-896q0-26 19-45t45-19 45 19l448 448q19 19 19 45z"/></svg>
                    </span>
                    </p>

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
                    </p>
                </div>

                <div>
                    <p class="px-4 py-1">I know you!</p>
                </div>

                <div class="flex items-start">
                    <img src="/img/spiderman.jpg">
                </div>

                <div class="flex flex-row w-full">
                    <ul class="flex flex-row w-full">
                        <li class="flex-1">Gosto</li>
                        <li class="flex-1">Comentar</li>
                        <li class="flex-1">Partilhar</li>
                    </ul>
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