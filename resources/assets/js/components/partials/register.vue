<template>
  <section class="register">
    <form class="form mt-4" onsubmit="submitForm">
      <!-- Este campo não é para preencher -->
      <input type="text"
             placeholder="Não Preencher!"
             class="hidden"
             id="subscribe"
             name="subscribe"
             v-model="form.botShit.value">

      <div class="form--group--inline">
        <div class="form--group md:w-1/2 md:mb-0">
          <label class="label" for="first_name">Nome</label>
          <input :class="firstNameError"
                 id="first_name"
                 ref="first_name"
                 type="text"
                 placeholder="Francisco"
                 autofocus
                 v-model="form.first_name.value">
          <p class="error">{{ form.first_name.feedback }}</p>
        </div>

        <div class="form--group md:w-1/2">
          <label class="label" for="last_name">Apelido</label>
          <input :class="lastNameError"
                 id="last_name"
                 ref="last_name"
                 type="text"
                 placeholder="Martins"
                 v-model="form.last_name.value">
          <p class="error">{{ form.last_name.feedback }}</p>
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="label" for="email">E-Mail</label>
          <input :class="emailError"
                 id="email"
                 ref="email"
                 type="email"
                 placeholder="f.martins@exemplo.com"
                 v-model="form.email.value">
          <p class="error">{{ form.email.feedback }}</p>
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="label" for="password">Password</label>
          <input :class="pwError"
                 id="password"
                 ref="password"
                 type="password"
                 placeholder="******************"
                 v-model="form.password.value">
          <p class="error">{{ form.password.feedback }}</p>
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="label" for="password_confirmation">Confirmar Password</label>
          <input :class="pwConfirmError"
                 id="password_confirmation"
                 ref="password_confirmation"
                 type="password"
                 placeholder="******************"
                 v-model="form.password_confirmation.value">
          <p class="error">{{ form.password_confirmation.feedback }}</p>
        </div>
      </div>

      <div>
        <button @click.prevent="submitForm" type="submit" class="btn btn-submit btn-block">REGISTAR</button>
      </div>
    </form>
  </section>
</template>

<script>
  import axios from 'axios'
  import { head } from 'lodash'

  export default {
    computed: {
      firstNameError () {
        return this.form.first_name.feedback
          ? 'input error'
          : 'input'
      },
      lastNameError () {
        return this.form.last_name.feedback
          ? 'input error'
          : 'input'
      },
      emailError () {
        return this.form.email.feedback
          ? 'input error'
          : 'input'
      },
      pwError () {
        return this.form.password.feedback
          ? 'input error'
          : 'input'
      },
      pwConfirmError  () {
        return this.form.password_confirmation.feedback
          ? 'input error'
          : 'input'
      }
    },

    data () {
      return {
        form: {
          first_name: {
            value: '',
            state: '',
            feedback: ''
          },
          last_name: {
            value: '',
            state: '',
            feedback: ''
          },
          email: {
            value: '',
            state: '',
            feedback: ''
          },
          password: {
            value: '',
            state: '',
            feedback: ''
          },
          password_confirmation: {
            value: '',
            state: '',
            feedback: ''
          },
          botShit: {
            value: '',
            state: '',
            feedback: ''
          }
        },
        payload: {
          _method: 'POST'
        }
      }
    },

    methods: {
      submitForm () {
        if (this.form.botShit.value !== '') {
          return false
        }

        this.payload.first_name = this.form.first_name.value
        this.payload.last_name = this.form.last_name.value
        this.payload.email = this.form.email.value
        this.payload.password = this.form.password.value
        this.payload.password_confirmation = this.form.password_confirmation.value

        this.postData()
      },

      postData () {
        this.resetErrors()

        axios
          .post('/register', this.payload)
          .then(() => {
            window.location = '/'
          })
          .catch((e) => {
            if (e.response.status === 422) {
              this.showValidationErrors(e.response.data.errors)
            }
          })
      },

      resetErrors () {
        for (let field in this.form) {
          if (this.form[field].hasOwnProperty('feedback')) {
            this.form[field].feedback = ''
          }
        }
      },

      resetForm () {
        this.form = {
          first_name: {
            value: '',
            state: '',
            feedback: ''
          },
          last_name: {
            value: '',
            state: '',
            feedback: ''
          },
          email: {
            value: '',
            state: '',
            feedback: ''
          },
          password: {
            value: '',
            state: '',
            feedback: ''
          },
          password_confirmation: {
            value: '',
            state: '',
            feedback: ''
          },
          botShit: {
            value: '',
            state: '',
            feedback: ''
          }
        }
      },

      showValidationErrors (errors) {
        let firstError

        for (let field in errors) {
          if (firstError === undefined) {
            firstError = field
          }

          if (this.form.hasOwnProperty(field)) {
            this.form[field].feedback = head(errors[field])
          }
        }
        this.$refs[firstError].focus()
      }
    },
  }
</script>