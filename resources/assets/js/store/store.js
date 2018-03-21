import * as actions from './actions'
import mutations from './mutations'

export default function () {
  return {
    actions,
    mutations,
    state: {
      collapsedWindows: [],
      currentProfileOriginalData: {},
      hiddenAlerts: []
    }
  }
}
