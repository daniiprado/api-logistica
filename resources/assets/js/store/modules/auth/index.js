import actions from './actions'
import mutations from './mutations'
import getters from './getters'

const state = {
    access_token: null,
    refresh_token: null,
    expires_in: null,
};

export default {
    actions, mutations, getters, state
}

