<template>
  <section class="user-profile">
    <div class="container mx-auto mt-16 p-4">
      <fade-transition>
        <div class="profile mt-4" v-if="profile">
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

            <div class="card-right m-2">
              <user-first-name/>
              <user-last-name/>
              <user-nick-name/>
              <user-bio/>

              <p class="text-grey-dark"><strong>XP:</strong> {{ profile.xp }}</p>
              <p class="text-grey-dark"><strong>Posts:</strong> 0</p>
              <p class="text-grey-dark"><strong>Comentários:</strong> 0</p>
            </div>
          </div>
        </div>
      </fade-transition>
    </div>
  </section>
</template>

<script>
  import axios from 'axios'
  import svgInfo from './svg/_svg-info'
  import { FadeTransition } from 'vue2-transitions'
  import userFirstName from './partials/_editable-user-first-name'
  import userLastName from './partials/_editable-user-last-name'
  import userNickName from './partials/_editable-user-nick-name'
  import userBio from './partials/_editable-user-bio'

  export default {
    beforeMount () {
      this.user = this.$store.state.user
      this.fetchProfile()
    },

    components: {
      FadeTransition,
      svgInfo,
      userFirstName,
      userLastName,
      userNickName,
      userBio
    },

    data () {
      return {
        user: {},
        profile: false
      }
    },

    methods: {
      fetchProfile () {
        axios
          .get(`/api/profile/${this.user.id}`)
          .then((r) => {
            this.profile = r.data.user.profile
          })
          .catch((e) => {
            // do sumethin
          })
      }
    },

    name: 'Profile'
  }
</script>
