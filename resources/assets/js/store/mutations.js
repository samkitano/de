let mutations = {
  SET_USER (state, user) {
    state.user = user
  },
  SET_WORKING (state, isWorking) {
    state.working = isWorking
  },
  SET_EDITING (state, field) {
    state.editing = field
  }
}

export default mutations
