import Vue from 'vue'

Vue.mixin({
  computed: {
    spinner: () => '<div class="spinner"><div class="s1"></div><div class="s2"></div><div></div></div>'
  }
})
