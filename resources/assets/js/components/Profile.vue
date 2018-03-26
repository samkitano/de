<template>
  <section class="user-profile">
    <no-session/>

    <div class="container mx-auto mt-16 p-4" v-if="user">
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
              <user-first-name/>
              <user-last-name/>
              <user-nick-name/>
              <user-bio/>

              <div class="flex flex-wrap justify-between items-center px-2 bg-grey-lighter rounded-b">
                <div class="text-grey-dark"><strong>XP:</strong> {{ user.xp }}</div>
                <div class="text-grey-dark"><strong>Posts:</strong> 0</div>
                <div class="text-grey-dark"><strong>Comentários:</strong> 0</div>

                <div class="my-4">
                  <a href="#" title="Alterar Password" class="btn btn-red btn-sm"><svg-key title="Alterar Password"/></a>
                  <a href="#" title="Alterar Email" class="btn btn-red btn-sm ml-2"><svg-envelope title="Alterar Email"/></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </fade-transition>

      <collapse-transition>
        <div class="editing-info rounded-b shadow-md" v-show="$store.state.editing.length">
          <div class="text-xs text-white flex flex-wrap bg-grey-dark items-center justify-between p-2">
            <p>A editar <strong>{{ ucFirst(editing) }}</strong>.</p>
            <p>{{ usage }}.</p>
            <p v-html="charCount"></p>
          </div>
        </div>
      </collapse-transition>
    </div>
  </section>
</template>

<script>
  import Bus from '../store/bus.js';
  import svgInfo from './svg/_svg-info'
  import svgEnvelope from './svg/_svg-envelope'
  import svgKey from './svg/_svg-key'
  import { FadeTransition } from 'vue2-transitions'
  import userFirstName from './partials/_editable-user-first-name'
  import userLastName from './partials/_editable-user-last-name'
  import userNickName from './partials/_editable-user-nick-name'
  import userBio from './partials/_editable-user-bio'
  import { CollapseTransition } from 'vue2-transitions'
  import noSession from './partials/_no-session'

  export default {
    beforeDestroy () {
      Bus.$off('fieldSize', this.setFieldSize)
    },

    beforeMount () {
      this.user = this.$store.state.user
      Bus.$on('fieldSize', this.setFieldSize)
    },

    components: {
      FadeTransition,
      svgInfo,
      svgEnvelope,
      svgKey,
      userFirstName,
      userLastName,
      userNickName,
      userBio,
      CollapseTransition,
      noSession
    },

    computed: {
      charCount () {
        let max = this.fieldSizes[this.editing]
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
        return this.usageTerms[this.editing]
      }
    },

    data () {
      return {
        user: false,
        usageTerms: {
          nome: 'Podes usar letras, hífens, espaços e pontos',
          apelido: 'Podes usar letras, hífens, espaços e pontos',
          nick: 'Podes usar letras, números e espaços',
          bio: 'Podes usar letras, números, espaços e pontuação'
        },
        fieldSizes: {
          nome: 30,
          apelido:  30,
          nick:  20,
          bio: 150
        },
        fieldSize: 0
      }
    },

    methods: {
      setFieldSize (val) {
        this.fieldSize = val
      }
    },

    name: 'Profile'
  }
</script>
