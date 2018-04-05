<script src="../../../../tailwind.js"></script>
<template>
    <section class="user-profile">
        <hero-mini/>
        <no-session/>

        <card/>

        <div class="container mx-auto p-4" v-if="user">
            <div class="feed bg-grey-lightest w-full p-4 rounded shadow">
                <div class="tabs w-full">
                    <ul class="flex flex-row items-stretch content-between justify-between w-full text-center list-reset">
                        <a href="#" class="w-1/4 hover:bg-grey-lighter p-3 hover:text-grey-darker text-grey-darker rounded"><li>Publicações</li></a>
                        <a href="#" class="w-1/4 hover:bg-grey-lighter p-3 hover:text-grey-darker text-grey-darker rounded"><li>Comentários</li></a>
                        <a href="#" class="w-1/4 hover:bg-grey-lighter p-3 hover:text-grey-darker text-grey-darker rounded"><li>Agradecimentos</li></a>
                        <a href="#" class="w-1/4 hover:bg-grey-lighter p-3 rounded"><li>Editar Perfil</li></a>
                    </ul>
                </div>
                <fade-transition>
                    <div class="profile mt-4" v-if="user">
                        <div class="alert alert-info mb-4">
                            <div class="alert--icon">
                                <svg-info width="4rem"/>
                            </div>

                            <div class="alert--text">
                                <ul>
                                    <li>Clica nos textos para editar. Dá <em>Enter</em> para guardar as alterações, <em>ESC</em> para cancelar.</li>
                                    <li>Visita <a target="_blank" href="https://gravatar.com"><em>gravatar.com</em></a> para definires a tua imagem de perfil.</li>
                                    <li>Poderás alterar o teu <em>nick</em> UMA única vez, quando atingires mais de 50 <em>XP</em>.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card flex shadow-md border-t-4 border-red">
                            <div class="card-left mr-2">
                                <img :src="user.gravatar" :alt="user.name">
                            </div>

                            <div class="card-right mt-2 flex flex-col justify-between flex-grow">
                                <editable label="Nome"
                                          fieldName="first_name"
                                          :validation="validation.nome"/>

                                <editable label="Apelido"
                                          fieldName="last_name"
                                          :validation="validation.apelido"/>

                                <editable label="Nickname"
                                          :editableIf="$store.state.user.canChangeNick"
                                          fieldName="nick_name"
                                          :validation="validation.nickname"/>

                                <editable label="Bio"
                                          fieldName="bio"
                                          :validation="validation.bio"/>

                                <div class="flex flex-wrap justify-between items-center px-2 bg-grey-lighter rounded-b">
                                    <div class="text-grey-dark"><strong>XP:</strong> {{ user.xp }}</div>

                                    <div class="text-grey-dark"><strong>Posts:</strong> 0</div>

                                    <div class="text-grey-dark"><strong>Comentários:</strong> 0</div>

                                    <div class="my-4">
                                        <a href="#"
                                           @click.prevent="showChangePwModal"
                                           title="Alterar Password"
                                           class="btn btn-red btn-sm"><svg-key title="Alterar Password"/></a>

                                        <a href="#"
                                           @click.prevent="showChangeEmailModal"
                                           title="Alterar Email"
                                           class="btn btn-red btn-sm ml-2"><svg-envelope title="Alterar Email"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fade-transition>

                <collapse-transition>
                    <div class="editing-info rounded-b shadow-md" v-show="$store.state.editing.length">
                        <div class="text-xs text-white flex flex-wrap bg-grey-dark items-center justify-between p-2">
                            <p>A editar: <strong>{{ ucFirst(editing) }}</strong>.</p>
                            <p>{{ usage }}.</p>
                            <p v-html="charCount"></p>
                        </div>
                    </div>
                </collapse-transition>
            </div>
        </div>



    </section>
</template>

<script>
  import Bus from '../store/bus.js';
  import svgKey from './svg/_svg-key';
  import svgInfo from './svg/_svg-info';
  import editable from './partials/_editable';
  import svgEnvelope from './svg/_svg-envelope';
  import noSession from './partials/_no-session';
  import { FadeTransition } from 'vue2-transitions';
  import { CollapseTransition } from 'vue2-transitions';
  import HeroMini from './partials/hero-mini.vue';
  import Card from './partials/card.vue';

  export default {
    beforeDestroy () {
      Bus.$off('fieldSize', this.setFieldSize)
    },

    beforeMount () {
      this.user = this.$store.state.user
      Bus.$on('fieldSize', this.setFieldSize)
    },

    components: {
      CollapseTransition,
      editable,
      FadeTransition,
      noSession,
      svgEnvelope,
      svgInfo,
      svgKey,
      HeroMini,
      Card
    },

    computed: {
      charCount () {
        let max = this.editing.length > 0 ? this.validation[this.editing].max : 0
        let curr = this.fieldSize
        let cl = curr === max
          ? 'error'
          : ''

        return `<span class="${cl}">${curr}/${max}</span> caracteres.`
      },

      editing () {
        return this.$store.state.editing
      },

      usage () {
        return this.editing.length > 0 ? `Podes utilizar ${this.validation[this.editing].msg}` : ''
      }
    },

    data () {
      return {
        user: false,
        validation: {
          nome: {
            min: 2,
            max: 30,
            msg: 'letras, hífens, espaços e pontos',
            regx: /[^a-zA-Z çÇàáãâÃÀÁÂéÉèÈíÍóÓòÒõÕôÔúÚ.-]/
          },
          apelido: {
            min: 2,
            max: 30,
            msg: 'letras, hífens, espaços e pontos',
            regx: /[^a-zA-Z çÇàáãâÃÀÁÂéÉèÈíÍóÓòÒõÕôÔúÚ.-]/
          },
          nickname: {
            min: 2,
            max: 20,
            msg: 'letras e números',
            regx: /[^a-zA-Z0-9çÇàáãâÃÀÁÂéÉèÈíÍóÓòÒõÕôÔúÚ]/
          },
          bio: {
            max: 150,
            msg: 'letras, números, espaços e pontuação',
            regx: /[^a-zA-Z0-9 _\-.,:;#!?+*%$€çÇàáãâÃÀÁÂéÉèÈíÍóÓòÒõÕôÔúÚ]/
          }
        },
        fieldSize: 0
      }
    },

    methods: {
      setFieldSize (val) {
        this.fieldSize = val
      },

      showChangeEmailModal () {
        this.$swal.setDefaults({
          input: 'email',
          confirmButtonText: 'Seguinte &rarr;',
          cancelButtonText: 'Cancelar',
          showCancelButton: true,
          progressSteps: ['1', '2', '3']
        })

        var steps = [
          {
            title: 'Email actual',
            text: 'Introduz o teu e-mail actual'
          },
          {
            title: 'Novo Email',
            text: 'Introduz o novo endereço de e-mail'
          },
          {
            title: 'Confirma o teu Novo Email',
            text: 'Re-introduz o novo endereço de e-mail'
          }
        ]

        this.$swal.queue(steps).then((result) => {
          this.$swal.resetDefaults()

          if (result.value) {
            this.$swal({
              title: 'Confirmação',
              confirmButtonText: 'Alterar',
              cancelButtonText: 'Cancelar',
              showCancelButton: true,
              html:
              'Antigo: ' + result.value[0] + ' | Novo: ' + result.value[2],
            })
              .then((r) => {
                // TODO post
              })
          }
        })
      },

      showChangePwModal () {
        // TODO
      }
    },

    name: 'Profile'
  }
</script>

<style lang="sass">

</style>
