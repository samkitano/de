<template>
  <div>
    <MainNav/>

    <div class="header w-full">
        <div class="overlay min-h-screen absolute pin-y pin-x bg-black opacity-50 w-full"/>
        
        <div class="header-text h-screen relative flex flex-col items-center justify-center w-full">
            <div class="form-container lg:w-2/5 md:w-3/5 md:mx-0"> 
                <ul class="tabs">
                    <li class="li">
                        <a @click="showLoginTab = true" :class="loginTabClass" href="#">LOGIN</a>
                    </li>

                    <li class="li">
                        <a @click="showLoginTab = false" :class="registerTabClass" href="#">REGISTAR</a>
                    </li>
                </ul>

                <div v-if="showLoginTab" class="">
                    <form class="form mt-4">
                        <!-- Este campo não é para preencher -->
                        <input type="hidden" id="subscribe" name="subscribe">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="label" for="email">E-Mail</label>
                                <input class="input" id="email" type="email" placeholder="f.martins@exemplo.com">
                                <p class="error"></p>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="label" for="password">Password</label>
                                <input class="input" id="password" type="password" placeholder="******************">
                                <p class="error"></p>
                            </div>
                        </div>

                        <div class="sm:flex sm:items-center mb-6 justify-between">
                            <label class="label ">
                                <input class="mr-2" type="checkbox">
                                <span class="text-sm">
                                    Lembrar
                                </span>
                            </label>

                            <label class="label right sm:mt-0 mt-4">
                                <span class="text-sm">
                                    <a href="#">Recuperar Password</a>
                                </span>
                            </label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-submit btn-block">LOGIN</button>
                        </div>
                    </form>
                </div>
                
                <div v-else>
                    <form class="form mt-4">
                        <!-- Este campo não é para preencher -->
                        <input type="hidden" id="newsletter" name="newsletter">

                        <div class="form-group-inline">
                            <div class="form-group md:w-1/2 md:mb-0">
                                <label class="label" for="name">Nome</label>
                                <input class="input" id="name" type="text" placeholder="Francisco">
                                <p class="error"></p>
                            </div>

                            <div class="form-group md:w-1/2">
                                <label class="label" for="surname">Apelido</label>
                                <input class="input" id="surname" type="text" placeholder="Martins">
                                <p class="error"></p>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="label" for="email">E-Mail</label>
                                <input class="input" id="email" type="email" placeholder="f.martins@exemplo.com">
                                <p class="error"></p>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="label" for="password">Password</label>
                                <input class="input" id="password" type="password" placeholder="******************">
                                <p class="error"></p>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="label" for="password_confirmation">Confirmar Password</label>
                                <input class="input" id="password_confirmation" type="password" placeholder="******************">
                                <p class="error"></p>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-submit btn-block">REGISTAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import MainNav from './MainNav.vue'

export default {
  components: {
    MainNav
  },
  data () {
      return {
          showLoginTab: true
      }
  },
  computed: {
      loginTabClass () {
          return this.showLoginTab
            ? 'tab active'
            : 'tab'
      },
      registerTabClass () {
          return this.showLoginTab
            ? 'tab'
            : 'tab active'
      },
  }
}
</script>

<style lang="sass">
.header
    background: url('/img/main10.jpg') no-repeat center center
    background-size: cover
</style>
