let mutations = {
  SET_USER (state, user) {
    state.user = user
  },
  SET_WORKING (state, isWorking) {
    state.working = isWorking
  }
}

export default mutations
