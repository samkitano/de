<template>
  <div class="container mx-auto mt-16 h-half flex items-center" v-if="!user">
    <div class="p-4 alert alert-error mx-auto">
      <h1 class="mb-4 mt-2">Ooops!</h1>
      <h2 class="mb-2">Desculpa, ou não tens sessão iniciada, ou a mesma expirou por inactividade <a class="text-blue" @click.prevent="showInfo" href="#"><svg-info width="1.3rem"/></a></h2>
      <h2>Clica <router-link to="/Entrar">aqui</router-link> para te autenticares.</h2>
    </div>
  </div>
</template>

<script>
  import svgInfo from '../svg/_svg-info-circle'

  export default {
    beforeMount () {
      this.user = this.$store.state.user
    },

    components: {
      svgInfo
    },

    data () {
      return {
        user: false
      }
    },

    methods: {
      showInfo () {
        this.$swal({
          title: 'SESSÃO',
          html: `<p class="text-left">Para segurança de todos, as sessões neste site expiram ao cabo de 120 min.
de inactividade. Se estiveres a utilizar um PC seguro, e se tens a certeza que apenas TU tens acesso,
podes evitar que as tuas sessões expirem colocando um visto em "LEMBRAR" na janela de login.</p>`,
          type: 'info'
        })
      }
    }
  }
</script>
