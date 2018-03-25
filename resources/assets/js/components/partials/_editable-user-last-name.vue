<template>
  <div class="editable-content mb-4">
    <div class="mb-1 flex">
      <strong>Apelido: </strong
      ><span v-on:blur="cancel"
             @keydown.13="change"
             @keydown.27="cancel"
             ref="last_name"
             @click="cleanup"
             :disabled="$store.state.working"
             class="ml-2"
             contenteditable="true">{{ $store.state.user.last_name }}</span
    ><span class="ml-2 text-red" v-show="$store.state.working" v-html="loader"></span></div>

    <p class="error">{{ last_name.feedback }}</p>
  </div>
</template>

<script>
  import axios from 'axios'
  import { head } from 'lodash'
  import { mapActions } from 'vuex'

  export default {
    computed: {
      invalidName () {
        let t = this.last_name.value

        return /[^a-zA-Z çÇàáãâÃÀÁÂéÉèÈíÍóÓòÒõÕôÔúÚ.-]/.test(t) || t.length > 150 || !t.length
      }
    },

    data () {
      return {
        last_name: {
          feedback: '',
          value: this.$store.state.user.last_name,
        },
        payload: {
          _method: 'PATCH',
          last_name: ''
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
        let name = this.$refs.last_name.innerText.trim()

        this.$refs.last_name.blur()
        e.preventDefault()

        this.last_name.value = name

        if (this.invalidName) {
          this.last_name.feedback = 'O apelido é obrigatório e só pode conter letras e pontuação.'
          this.unsetWorking()
          return false
        }

        this.payload.last_name = this.last_name.value

        axios.post(`/api/profile/${this.$store.state.user.id}`, this.payload)
          .then((r) => {
            this.unsetWorking()
            this.setUser(r.data.user)
            this.$swal('Feito!', 'Apelido alterado!', 'success')
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
        this.last_name.feedback = ''
      },

      showValidationErrors (errors) {
        this.last_name.feedback = head(errors['last_name'])
      }
    }
  }
</script>
