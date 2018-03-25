<template>
  <div class="editable-content mb-4">
    <div class="mb-1 flex">
      <strong>Nome: </strong
      ><span v-on:blur="cancel"
             @keydown.13="change"
             @keydown.27="cancel"
             ref="first_name"
             @click="cleanup"
             :disabled="$store.state.working"
             class="ml-2"
             contenteditable="true">{{ $store.state.user.first_name }}</span
    ><span class="ml-2 text-red" v-show="$store.state.working" v-html="loader"></span></div>

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
      ...mapActions(['setUser', 'setWorking', 'unsetWorking']),

      cancel () {
        document.execCommand('undo')
      },

      change (e) {
        this.setWorking()
        let name = this.$refs.first_name.innerText.trim()

        this.$refs.first_name.blur()
        e.preventDefault()

        this.first_name.value = name

        if (this.invalidName) {
          this.first_name.feedback = 'O nome é obrigatório e só pode conter letras e pontuação.'
          this.unsetWorking()
          return false
        }

        this.payload.first_name = this.first_name.value

        axios.post(`/api/profile/${this.$store.state.user.id}`, this.payload)
          .then((r) => {
            this.setUser(r.data.user)
            this.unsetWorking()
            this.$swal('Feito!', 'Nome alterado!', 'success')
          })
          .catch((e) => {
            this.unsetWorking()
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
