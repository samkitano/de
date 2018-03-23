<template>
  <section class="login">
    <form class="form mt-4">
      <!-- Este campo não é para preencher -->
      <input type="text"
             placeholder="Não Preencher!"
             class="hidden"
             id="subscribe"
             name="subscribe"
             v-model="form.botShit.value">

      <div class="form--group--inline">
        <div class="form--group">
          <label class="label" for="email">E-Mail</label>
          <input :class="emailError"
                 id="email"
                 type="email"
                 ref="email"
                 autofocus
                 placeholder="f.martins@exemplo.com"
                 v-model="form.email.value"
          >
          <p class="error">{{ form.email.feedback }}</p>
          <p class="form-info" v-if="isForgotPw">Será enviado um e-mail com instruções.</p>
        </div>
      </div>

      <div v-if="!isForgotPw">
        <div class="form--group--inline">
          <div class="form--group">
            <label class="label" for="password">Password</label>
            <input :class="pwError"
                   type="password"
                   id="password"
                   ref="password"
                   placeholder="******************"
                   v-model="form.password.value">
            <p class="error">{{ form.password.feedback }}</p>
          </div>
        </div>

        <div class="checkbox sm:flex sm:items-center">
          <label class="label">
            <input type="checkbox" id="remember" v-model="form.remember">
            <span class="text-sm">Lembrar</span>
          </label>

          <div class="label right mt-4 sm:mt-0">
            <a @click.prevent="isForgotPw = true" href="#">Recuperar Password</a>
          </div>
        </div>
      </div>

      <div v-else class="sm:text-right my-4 sm:mt-0">
        <div class="label">
          <a @click.prevent="isForgotPw = false" href="#">&#8617; Login</a>
        </div>
      </div>

      <div>
        <button type="submit"
                class="btn btn-submit btn-block"
                @click.prevent="submitForm">
          {{ submitText }}
        </button>
      </div>
    </form>
  </section>
</template>

<script>
  import axios from 'axios'
  import { head } from 'lodash'

  export default {
    computed: {
      submitText () {
        return this.isForgotPw
          ? 'RECUPERAR'
          : 'LOGIN'
      },
      endpoint () {
        return this.isForgotPw
          ? '/password/reset'
          : '/login'
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
      }
    },

    data () {
      return {
        form: {
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
          botShit: {
            value: '',
            state: '',
            feedback: ''
          },
          remember: false
        },
        isForgotPw: false,
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

        this.payload.email = this.form.email.value

        if (!this.isForgotPw) {
          this.payload.password = this.form.password.value

          if (this.form.remember) {
            this.payload.remember = this.form.remember
          }
        }

        this.postData()
      },

      postData () {
        this.resetErrors()

        axios
          .post(this.endpoint, this.payload)
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
          botShit: {
            value: '',
            state: '',
            feedback: ''
          },
          remember: false
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

    watch: {
      isForgotPw () {
        this.resetForm()
      }
    }
  }
</script>
