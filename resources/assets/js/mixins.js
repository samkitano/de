import Vue from 'vue'

Vue.mixin({
  computed: {
    spinner: () => '<div class="spinner"><div class="s1"></div><div class="s2"></div><div></div></div>',
    loader: () => `
<div class="loader">
<svg xmlns="http://www.w3.org/2000/svg"
x="0px"
y="0px"
class="fill-current"
width="1rem"
height="1rem"
viewBox="0 0 24 30"
style="enable-background:new 0 0 50 50;"
xml:space="preserve">
<rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
<animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
<animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
<animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
</rect>
<rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">
<animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
<animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
<animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
</rect>
<rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">
<animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
<animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
<animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
</rect>
</svg>
</div>`
  },

  methods: {
    /**
     * Capitalize first letter
     *
     * @param str String
     *
     * @returns {string}
     */
    ucFirst: str => str.charAt(0).toUpperCase() + str.slice(1),

    /**
     * Alerts for a 500 range error
     *
     * @requires 'vue-sweetalert2'
     *
     * @param e
     */
    alertSystemError: e => {
      this.$swal('Eh la!', 'Ocorreu um erro no sistema. Por favor tenta de novo, ou contacta um administrador.', 'error')
    },

    /**
     * Check if keystroke is delete
     *
     * @param e
     * @returns {boolean}
     */
    isDelKey: e => e.keyCode === 8 || e.keyCode === 46
  },
})
