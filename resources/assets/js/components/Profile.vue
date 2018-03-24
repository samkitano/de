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

          <div class="card flex shadow-md">
            <div class="card-left">
              <img :src="user.gravatar" :alt="user.name">
            </div>

            <div class="card-right ml-2">
              <user-first-name :user="user"/>

              <!--<h2 class="mb-4">-->
                <!--<strong>Apelido:</strong> <span id="last_name" contenteditable="true">{{ user.last_name}}</span>-->
              <!--</h2>-->
              <!--<p class="error">{{ last_name.feedback }}</p>-->

              <!--<h2 class="mb-4">-->
                <!--<strong>Nick:</strong> <span id="nick_name" :contenteditable="profile.canChangeNick">{{ user.nick_name }}</span>-->
              <!--</h2>-->
              <!--<p class="error">{{ nick_name.feedback }}</p>-->

              <!--<h2 class="mb-4">-->
                <!--<strong>Bio:</strong> <span id="bio" contenteditable="true">{{ profile.bio }}</span>-->
              <!--</h2>-->
              <!--<p class="error">{{ bio.feedback }}</p>-->

              <p><strong>XP:</strong> {{ profile.xp }}</p>
              <p><strong>Posts:</strong> 0</p>
              <p><strong>Comentários:</strong> 0</p>
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

  const wuser = window.user

  export default {
    beforeMount () {
      this.user = JSON.parse(wuser)
      this.fetchProfile()
    },

    components: {
      FadeTransition,
      svgInfo,
      userFirstName
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
