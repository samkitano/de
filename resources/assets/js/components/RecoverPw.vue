<template>
  <div class="auth">
    <div class="auth--overlay"/>

    <div class="auth--container">
      <div class="form--container lg:w-2/5 md:w-3/5 md:mx-0">
        <div class="tabs">
          <div class="w-full text-center bg-grey-light">
            <a @click.prevent="noop" class="tab active" href="#">RECUPERAR PASSWORD</a>
          </div>
        </div>

        <section class="recover-pw">
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
                       disabled
                       placeholder="f.martins@exemplo.com"
                       v-model="form.email.value"
                >
                <p class="error">{{ form.email.feedback }}</p>
              </div>
            </div>

            <div class="form--group--inline">
              <div class="form--group">
                <label class="label" for="password">Nova Password</label>
                <input :class="pwError"
                       type="password"
                       id="password"
                       ref="password"
                       autofocus
                       required
                       placeholder="******************"
                       v-model="form.password.value">
                <p class="error">{{ form.password.feedback }}</p>
              </div>
            </div>

            <div class="form--group--inline">
              <div class="form--group">
                <label class="label" for="password_confirmation">Confirmar Nova Password</label>
                <input :class="pwConfirmError"
                       type="password"
                       id="password_confirmation"
                       ref="password_confirmation"
                       placeholder="******************"
                       required
                       v-model="form.password_confirmation.value">
                <p class="error">{{ form.password_confirmation.feedback }}</p>
              </div>
            </div>

            <div>
              <button type="submit"
                      class="btn btn-submit btn-block"
                      :disabled="working"
                      @click.prevent="submitForm">Gravar</button>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    beforeMount () {
      this.form.email.value = this.$route.params.email
      this.token = this.$route.params.token
    },

    computed: {
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
        token: '',
        working: false
      }
    },

    methods: {
      noop () {},

      submitForm () {
        this.working = true

        if (this.form.botShit.value !== '') {
          return false
        }

        this.payload.token = this.token
        this.payload.email = this.form.email.value
        this.payload.password = this.form.password.value
        this.payload.password_confirmation = this.form.password_confirmation.value

        this.postData()
      },

      postData () {
        this.resetErrors()

        axios
          .post(this.endpoint, this.payload)
          .then((r) => {
            this.$swal(`Olá, ${r.data.first_name}!`, 'A tua nova password foi registada.', 'success')
              .then(() => {
                window.location = '/'
              })
          })
          .catch((e) => {
            this.working = false

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

        this.token = ''
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

    name: 'RecoverPw'
  }
</script>

<style lang="sass">
  .auth
    background: url('/img/main10.jpg') no-repeat center center
    background-size: cover
</style>
