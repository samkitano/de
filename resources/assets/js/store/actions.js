export const setUser = ({ commit }, user) => {
  commit('SET_USER', user)
}

export const setWorking = ({ commit }) => {
  commit('SET_WORKING', true)
}

export const unsetWorking = ({ commit }) => {
  commit('SET_WORKING', false)
}

export const setEditing = ({ commit }, field) => {
  commit('SET_EDITING', field)
}

export const unsetEditing = ({ commit }) => {
  commit('SET_EDITING', '')
}
