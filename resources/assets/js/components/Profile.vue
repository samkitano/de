<template>
  <section class="user-profile">
    <div class="container mx-auto mt-16 p-4">
      <fade-transition>
        <div class="profile mt-4" v-if="user">
          <div class="alert alert-info mb-4">
            <div class="alert--icon">
              <svg-info width="4rem"></svg-info>
            </div>

            <div class="alert--text">
              <ul>
                <li>Clica nos textos sublinhados para editar. Dá <em>Enter</em> para guardar as alterações, <em>ESC</em> para cancelar.</li>
                <li>Visita <a target="_blank" href="https://gravatar.com"><em>gravatar.com</em></a> para definires a tua imagem de perfil.</li>
                <li>Poderás alterar o teu <em>nick</em> UMA única vez, quando atingires mais de 50 <em>XP</em>.</li>
              </ul>
            </div>
          </div>

          <div class="card flex shadow-md border-t-4 border-red">
            <div class="card-left">
              <img :src="user.gravatar" :alt="user.name">
            </div>

            <div class="card-right m-2 flex flex-col justify-between flex-grow">
              <user-first-name/>
              <user-last-name/>
              <user-nick-name/>
              <user-bio/>

              <div class="flex flex-wrap justify-between items-center px-2 bg-grey-lighter rounded-b">
                <div class="text-grey-dark"><strong>XP:</strong> {{ user.xp }}</div>
                <div class="text-grey-dark"><strong>Posts:</strong> 0</div>
                <div class="text-grey-dark"><strong>Comentários:</strong> 0</div>

                <div class="my-4">
                  <a href="#" class="btn btn-red btn-sm"><svg-key title="Alterar Password"/></a>
                  <a href="#" class="btn btn-red btn-sm ml-2"><svg-envelope title="Alterar Email"/></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </fade-transition>

      <collapse-transition>
        <div class="editing-info" v-show="true">
          <div>
            <p>A editar <strong>{{ editing }}</strong>.</p>
            <p>Utiliza {{ usage }}.</p>
            <p>{{ charCount }} caracteres</p>
          </div>
        </div>
      </collapse-transition>
    </div>
  </section>
</template>

<script>
  import axios from 'axios'
  import svgInfo from './svg/_svg-info'
  import svgEnvelope from './svg/_svg-envelope'
  import svgKey from './svg/_svg-key'
  import { FadeTransition } from 'vue2-transitions'
  import userFirstName from './partials/_editable-user-first-name'
  import userLastName from './partials/_editable-user-last-name'
  import userNickName from './partials/_editable-user-nick-name'
  import userBio from './partials/_editable-user-bio'
  import { CollapseTransition } from 'vue2-transitions'

  export default {
    beforeMount () {
      this.user = this.$store.state.user
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
      CollapseTransition
    },

    computed: {
      charCount () {
        return '15/30'
      },

      editing () {
        return 'whatever'
      },

      usage () {
        return 'Letras, números, bla bla'
      }
    },

    data () {
      return {
        user: {}
      }
    },

    // methods: {
    //   //
    // },

    name: 'Profile'
  }
</script>
