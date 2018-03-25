import * as actions from './actions'
import mutations from './mutations'

const wuser = window.user

export default function () {
  return {
    actions,
    mutations,
    state: {
      user: JSON.parse(wuser),
      working: false
    }
  }
}
