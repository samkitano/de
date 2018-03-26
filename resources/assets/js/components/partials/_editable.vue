<template>
  <div class="editable-content mb-4">
    <div class="mb-1 flex">
      <strong>{{ label }}: </strong
      ><span v-on:blur="cancel"
             @keydown.13="change"
             @keydown.27="cancel"
             @keydown="emitCount"
             ref="editableField"
             @click="startEditing"
             v-on:focus="startEditing"
             :disabled="working"
             class="ml-2"
             :contenteditable="editableIf">{{ field }}</span
      ><span class="ml-2 text-red"
             v-show="showLoader"
             v-html="loader"></span
      ></div
    >

    <p class="error">{{ error }}</p>
  </div>
</template>

<script>
  import axios from 'axios'
  import { head } from 'lodash'
  import { mapActions } from 'vuex'
  import Bus from '../../store/bus.js';

  export default {
    computed: {
      fieldIsInvalid () {
        let t = this.field

        return this.validation.regx.test(t) || t.length > this.validation.max || t.length < this.validation.min
      },

      working () {
        return this.$store.state.working
      }
    },

    data () {
      return {
        error: '',
        field: this.$store.state.user[this.fieldName],
        payload: {
          _method: 'PATCH'
        },
        showLoader: false
      }
    },

    methods: {
      ...mapActions(['setUser', 'setWorking', 'unsetWorking', 'setEditing', 'unsetEditing']),

      cancel () {
        this.$refs.editableField.innerText = this.field
        this.unsetEditing()
      },

      change (e) {
        this.setWorking()
        this.emitFieldSize()
        this.showLoader = true

        let change = this.$refs.editableField.innerText.trim()

        this.$refs.editableField.blur()

        e.preventDefault()

        this.field = change

        if (this.fieldIsInvalid) {
          this.error = `Este campo contém caracteres não permitidos. Podes usar: ${this.validation.msg}.`
          this.unsetWorking()
          this.unsetEditing()
          this.showLoader = false

          return false
        }

        this.payload[this.fieldName] = this.field

        axios.post(`/api/profile/${this.$store.state.user.id}`, this.payload)
          .then((r) => {
            this.unsetWorking()
            this.setUser(r.data.user)
            this.unsetEditing()
            this.showLoader = false

            this.$swal('Feito!', `Campo ${this.label} alterado!`, 'success')
          })
          .catch((e) => {
            this.unsetWorking()
            this.unsetEditing()
            this.showLoader = false

            if (e.response.status === 422) {
              this.showValidationErrors(e.response.data.errors)
            } else {
              this.alertSystemError(e)
            }
          })
      },

      emitCount (e) {
        let size = this.emitFieldSize()

        if (size === this.validation.max && !this.isDelKey(e)) {
          e.preventDefault()

          return false
        }
      },

      emitFieldSize () {
        let size = this.$refs.editableField.innerText.length

        Bus.$emit('fieldSize', size)

        return size
      },

      showValidationErrors (errors) {
        this.error = head(errors[this.fieldName])
      },

      startEditing () {
        this.error = ''
        this.setEditing(this.label.toLowerCase())
        this.emitFieldSize()
      }
    },

    props: {
      editableIf: {
        required: false,
        default: true,
        type: Boolean
      },
      fieldName: {
        required: true,
        type: String
      },
      label: {
        required: true,
        type: String
      },
      validation: {
        required: true,
        type: Object,
        msg: {
          required: true,
          type: String
        },
        regx: {
          required: true,
          type: String
        },
        min: {
          required: false,
          type: Number,
          default: 0
        },
        max: {
          required: true,
          type: Number
        }
      }
    }
  }
</script>