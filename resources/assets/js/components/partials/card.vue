<template>
    <div class="card-holder w-full pb-4 relative">
        <div class="card -mt-16 shadow-md flex content-center justify-center border-t-7 border-red mx-auto lg:w-3/5 sm:w-5/6 h-76">
            <div class="card-left p-8 text-center items-center justify-around content-between flex flex-col w-1/3 h-full mx-auto bg-grey-lightest">
                <div class="">
                    <img :src="$store.state.user.gravatar" class="w-20 h-20 rounded-full">
                </div>

                <div class="text-center">
                    <span class="font-bold block w-full">{{ $store.state.user.first_name }} {{ $store.state.user.last_name }}</span>
                    <span class="italic block w-full text-grey">@{{ $store.state.user.nick_name }}</span>
                </div>

                <div class="">
                    {{ $store.state.user.bio }}
                </div>
            </div>


            <div class="card-right px-4 pb-4 flex flex-grow flex-col items-stretch justify-between h-full w-2/3 bg-dark text-white">
                <div class="flex w-full">
                    <div class="red content-center mx-auto inline-flex w-32 h-44 bg-red rounded-b-full">
                        <div class="dotted mb-2 flex self-end mx-auto border rounded-full border-dashed border-white w-28 h-28 mt-24">
                            <h1 class="self-center mx-auto w-auto justify-center content-center text-center">
                                DE
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="flex w-full">
                        <span class="bg-red inline-flex w-auto mx-auto py-2 px-8 justify-center content-center text-center">
                            LICENCIADO
                        </span>
                </div>

                <div class="flex flex-row items-stretch justify-between text-center w-full font-bold">
                    <div class="w-1/3">
                        1000 <span class="text-red">XP</span>
                    </div>

                    <div class="w-1/3">
                        37 <span class="text-red">Comentários</span>
                    </div>

                    <div class="w-1/3">
                        384 <span class="text-red">Agradecimentos</span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
  export default {
    name: 'card'
  }
</script>

<style scoped>

</style>