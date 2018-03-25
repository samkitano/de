<template>
  <div class="editable-content mb-4">
    <div class="mb-1 text-2xl">
      <strong>Nome: </strong
      ><span v-on:blur="cancel"
             @keydown.13="change"
             @keydown.27="cancel"
             ref="first_name"
             @click="cleanup"
             contenteditable="true">{{ $store.state.user.first_name }}</span
    ></div>

    <p class="error">{{ first_name.feedback }}</p>
  </div>
</template>

<script>
  import axios from 'axios'
  import { head } from 'lodash'
  import { mapActions } from 'vuex'

  export default {
    computed: {
      invalidName () {
        let t = this.first_name.value

        return /[^a-zA-Z çÇàáãâÃÀÁÂéÉèÈíÍóÓòÒõÕôÔúÚ.-]/.test(t) || t.length > 150 || !t.length
      }
    },

    data () {
      return {
        first_name: {
          feedback: '',
          value: this.$store.state.user.first_name,
        },
        payload: {
          _method: 'PATCH',
          first_name: ''
        }
      }
    },

    methods: {
      ...mapActions(['setUser']),

      cancel () {
        document.execCommand('undo')
      },

      change (e) {
        let name = this.$refs.first_name.innerText.trim()

        e.target.blur()
        e.preventDefault()

        this.first_name.value = name

        if (this.invalidName) {
          this.first_name.feedback = 'O nome é obrigatório e só pode conter letras e pontuação.'
          return false
        }

        this.payload.first_name = this.first_name.value

        axios.post(`/api/profile/${this.$store.state.user.id}`, this.payload)
          .then((r) => {
            this.setUser(r.data.user)
            this.$swal('Feito!', 'Nome alterado!', 'success')
          })
          .catch((e) => {
            if (e.response.status === 422) {
              this.showValidationErrors(e.response.data.errors)
            } else {
              // TODO
            }
          })
      },

      cleanup () {
        this.first_name.feedback = ''
      },

      showValidationErrors (errors) {
        this.first_name.feedback = head(errors['first_name'])
      }
    }
  }
</script>
