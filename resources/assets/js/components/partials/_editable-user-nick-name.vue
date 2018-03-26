<template>
  <div class="editable-content mb-4">
    <div class="mb-1 flex">
      <strong>Nickname: </strong
      ><span v-on:blur="cancel"
             @keydown.13="change"
             @keydown.27="cancel"
             ref="nick_name"
             @click="cleanup"
             :disabled="$store.state.working"
             class="ml-2"
             :contenteditable=" $store.state.user.canChangeNick">{{ $store.state.user.nick_name }}</span
    ><span class="ml-2 text-red" v-show="$store.state.working" v-html="loader"></span></div>

    <p class="error">{{ nick_name.feedback }}</p>
  </div>
</template>

<script>
  import axios from 'axios'
  import { head } from 'lodash'
  import { mapActions } from 'vuex'

  export default {
    computed: {
      invalidName () {
        let t = this.nick_name.value

        return /[^a-zA-Z0-9çÇàáãâÃÀÁÂéÉèÈíÍóÓòÒõÕôÔúÚ-]/.test(t) || t.length > 150 || !t.length
      }
    },

    data () {
      return {
        nick_name: {
          feedback: '',
          value: this.$store.state.user.nick_name,
        },
        payload: {
          _method: 'PATCH',
          nick_name: ''
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
        let name = this.$refs.nick_name.innerText.trim()

        this.$refs.nick_name.blur()
        e.preventDefault()

        this.nick_name.value = name

        if (this.invalidName) {
          this.nick_name.feedback = 'O nick é obrigatório e só pode conter letras, números e hífens.'
          this.unsetWorking()
          return false
        }

        this.payload.nick_name = this.nick_name.value

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
        this.nick_name.feedback = ''
      },

      showValidationErrors (errors) {
        this.nick_name.feedback = head(errors['nick_name'])
      }
    }
  }
</script>
