export const setUser = ({ commit }, user) => {
  commit('SET_USER', user)
}

export const setWorking = ({ commit }) => {
  commit('SET_WORKING', true)
}

export const unsetWorking = ({ commit }) => {
  commit('SET_WORKING', false)
}
