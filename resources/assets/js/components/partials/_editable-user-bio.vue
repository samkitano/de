<template>
  <div class="editable-content mb-4">
    <div class="mb-1 flex">
      <strong>Bio: </strong
      ><span v-on:blur="cancel"
             @keydown.13="change"
             @keydown.27="cancel"
             @keyup="emitCount"
             ref="bio"
             @click="cleanup"
             :disabled="$store.state.working"
             class="ml-2"
             contenteditable="true">{{ $store.state.user.bio }}</span
    ><span class="ml-2 text-red" v-show="$store.state.working" v-html="loader"></span></div>

    <p class="error">{{ bio.feedback }}</p>
  </div>
</template>

<script>
  import axios from 'axios'
  import { head } from 'lodash'
  import { mapActions } from 'vuex'
  import Bus from '../../store/bus.js';

  export default {
    computed: {
      invalidName () {
        let t = this.bio.value

        return /[^a-zA-Z0-9 _\-.,:;#!?+*%$€çÇàáãâÃÀÁÂéÉèÈíÍóÓòÒõÕôÔúÚ]/.test(t) || t.length > 150
      }
    },

    data () {
      return {
        bio: {
          feedback: '',
          value: this.$store.state.user.bio,
        },
        payload: {
          _method: 'PATCH',
          bio: ''
        }
      }
    },

    methods: {
      ...mapActions(['setUser', 'setWorking', 'unsetWorking', 'setEditing', 'unsetEditing']),

      cancel () {
        document.execCommand('undo')
        this.unsetEditing()
      },

      change (e) {
        this.setWorking()
        this.unsetEditing()
        Bus.$emit('fieldSize', this.$refs.bio.innerText.length)
        let name = this.$refs.bio.innerText.trim()

        this.$refs.bio.blur()
        e.preventDefault()

        this.bio.value = name

        if (this.invalidName) {
          this.bio.feedback = 'A bio contém caracteres não permitidos. Utiliza apenas letras, números e pontuação.'
          this.unsetWorking()
          return false
        }

        this.payload.bio = this.bio.value

        axios.post(`/api/profile/${this.$store.state.user.id}`, this.payload)
          .then((r) => {
            this.unsetWorking()
            this.setUser(r.data.user)
            this.$swal('Feito!', 'Bio alterada!', 'success')
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
        this.bio.feedback = ''
        this.setEditing('bio')
        Bus.$emit('fieldSize', this.$refs.bio.innerText.length)
      },

      emitCount () {
        Bus.$emit('fieldSize', this.$refs.bio.innerText.length)
      },

      showValidationErrors (errors) {
        this.bio.feedback = head(errors['bio'])
      }
    }
  }
</script>
